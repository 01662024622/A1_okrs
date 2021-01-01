<?php

namespace App\Http\Controllers\HT00;

use App\Http\Controllers\Base\ResouceController;
use App\Models\HT00\CategoryApartment;
use App\Models\HT00\CategoryUser;
use App\Services\HT00\CategoryService;
use Illuminate\Http\Request;
use App\Models\HT00\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;

class CategoryController extends ResouceController
{
    function __construct(CategoryService $service)
    {
        $this->middleware('auth');
        parent::__construct($service, array('active' => 'category', 'group' => 'configuration'));
        View::share('categories', $service->all());
    }

    public function store(Request $request)
    {
        $data = [];
        if (!$request->has("id")) {
            $data['slug'] = Str::slug((string)$request->title, '-') . time();
            $data['sort'] = (int)time();
            if (!$request->has("url")) {
                $data['url'] = "/categories/" . $data['slug'];
            }
        }
        $category = parent::storeRequest($request, $data);

        if ($request->has('users')) {
            $users = $request->users;
            foreach ($users as $user) {
                $arr = explode("_", $user);
                $new_user['user_id'] = (int)$arr[0];
                $new_user['role'] = (int)$arr[1];
                $new_user['category_id'] = (int)$category->id;
                $new_user['create_by'] = Auth::id();
                CategoryUser::create($new_user);
            }
        }
        if ($request->has('apartments')) {
            $apartments = $request->apartments;
            foreach ($apartments as $apartment) {
                $arr = explode("_", $apartment);
                $new_apartment['apartment_id'] = (int)$arr[0];
                $new_apartment['role'] = (int)$arr[1];
                $new_apartment['category_id'] = (int)$category->id;
                $new_apartment['create_by'] = Auth::id();
                CategoryApartment::create($new_apartment);
            }
        }
        if ($request->has('user_update')) {
            $user_update = $request->user_update;
            foreach ($user_update as $user) {
                $arr = explode("_", $user);
                $object_update['role'] = (int)$arr[1];
                $object_update['modify_by'] = Auth::id();
                CategoryUser::find($arr[0])->update($object_update);
            }
        }
        if ($request->has('apartment_update')) {
            $apartment_update = $request->apartment_update;
            foreach ($apartment_update as $apartment) {
                $arr = explode("_", $apartment);
                $apartment_update['role'] = (int)$arr[1];
                $apartment_update['modify_by'] = Auth::id();
                CategoryApartment::find($arr[0])->update($apartment_update);
            }
        }
        return $category;
    }

    public function post($slug)
    {
        $products = Category::where('slug', $slug)->first();
        return $products;
    }

    public function tests()
    {
        $user = Auth::user();
        $categoriesId = DB::select('SELECT id FROM ht00_categories ct WHERE role < 2 AND id NOT IN(
                SELECT DISTINCT(category_id) as id FROM ht00_category_user us where us.role=2 AND us.user_id=' . $user->id . ' UNION
                SELECT ap.category_id as id FROM ht00_category_apartment ap where ap.role=2 and ap.apartment_id=' . $user->apartment_id . ' AND ap.category_id NOT IN(
                SELECT us.category_id as id FROM ht00_category_user us WHERE us.role=1 and us.user_id=' . $user->id . '))
                UNION
                SELECT id FROM ht00_categories WHERE role = 2 AND id IN(
                SELECT DISTINCT(category_id) as id FROM ht00_category_user us where us.role=1 AND us.user_id=' . $user->id . ' UNION
                SELECT ap.category_id as id FROM ht00_category_apartment ap where ap.role=1 and ap.apartment_id=' . $user->apartment_id . ' AND ap.category_id NOT IN(
                SELECT us.category_id as id FROM ht00_category_user us WHERE us.role=2 and us.user_id=' . $user->id . '))');
        $array = [];
        foreach ($categoriesId as $id) {
            array_push($array, $id->id);
        }
        $categories = Category::where('status', 0)->where('type', '>', 0)->whereIn('id', $array)->orderBy('sort')
            ->get(['id', 'title', 'slug', 'type', 'sort']);
        $nav = '';
        foreach ($categories as $category) {
            $sub = Category::where('status', 0)->where('parent_id', $category->id)->whereIn('id', $array)->orderBy('sort')
                ->get(['id', 'title', 'parent_id', 'slug', 'url', 'sort']);
            if (count($sub) > 0) {
                if ($category->type == 1) {
                    $nav = $nav . '<hr class="sidebar-divider">
            <li class="nav-item" id="' . $category->slug . '">
                <a class="nav-link" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapsePages' . $category->slug . '"
                   aria-controls="collapsePages' . $category->slug . '">
                    ' . $category->title . '
                </a>
                <div id="collapsePages' . $category->slug . '" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">';
                    foreach ($sub as $element) {
                        $nav = $nav . '<a id="' . $element->slug . '" class="collapse-item"  href="' . $element->url . '">
                                <span>' . $element->title . '</span>
                            </a>';
                    }
                    $nav = $nav . '</div>
                </div>
            </li>';
                } else {
                    $nav = $nav . '<hr class="sidebar-divider">';
                    foreach ($sub as $element) {
                        $nav = $nav . '<li class="nav-item" id="' . $element->slug . '">
            <a class="nav-link" href="' . $element->url . '">
                <span>' . $element->title . '</span></a>
        </li>';
                    }
                }
            }
        }
        return $nav;
    }

}

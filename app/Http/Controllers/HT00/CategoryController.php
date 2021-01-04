<?php

namespace App\Http\Controllers\HT00;

use App\Http\Controllers\Base\ResouceController;
use App\Models\HT00\CategoryApartment;
use App\Models\HT00\CategoryUser;
use App\Models\HT00\Post;
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
    public function edit($slug){
        $user=Auth::user();
        $postId = DB::select('SELECT id FROM ht00_posts ct WHERE role < 3 AND status=0 AND id NOT IN(
                SELECT DISTINCT(post_id) as id FROM ht00_post_user us where us.role=2 AND us.user_id=' . $user->id . ' UNION
                SELECT ap.post_id as id FROM ht00_post_apartment ap where ap.role=2 and ap.apartment_id=' . $user->apartment_id . ' AND ap.post_id NOT IN(
                SELECT us.post_id as id FROM ht00_post_user us WHERE us.role=1 and us.user_id=' . $user->id . '))
                UNION
                SELECT id FROM ht00_posts WHERE role = 3 AND id IN(
                SELECT DISTINCT(post_id) as id FROM ht00_post_user us where us.role=1 AND us.user_id=' . $user->id . ' UNION
                SELECT ap.post_id as id FROM ht00_post_apartment ap where ap.role=1 and ap.apartment_id=' . $user->apartment_id . ' AND ap.post_id NOT IN(
                SELECT us.post_id as id FROM ht00_post_user us WHERE us.role=2 and us.user_id=' . $user->id . '))');

        $array = [];
        foreach ($postId as $id) {
            array_push($array, $id->id);
        }
        $posts=Post::join('ht00_post_category', 'ht00_posts.id', '=', 'ht00_post_category.post_id')
            ->join('ht00_categories', 'ht00_categories.id', '=', 'ht00_post_category.category_id')
            ->where('ht00_categories.slug',$slug)
            ->whereIn('ht00_posts.id',$array)->get(['ht00_posts.slug','ht00_posts.title','ht00_posts.updated_at','ht00_posts.avata']);
        return view('category.edit',['posts'=>$posts]);
    }
    public function store(Request $request)
    {
        $data = [];
        if (!$request->has("id")) {
            $data['slug'] = Str::slug((string)$request->title, '-') . time();
            $data['sort'] = (int)time();
            if (!$request->has("url")) {
                $data['url'] = "/categories/" . $data['slug'].'/edit';
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
}

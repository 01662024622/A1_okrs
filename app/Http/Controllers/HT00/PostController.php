<?php

namespace App\Http\Controllers\HT00;

use App\Http\Controllers\Base\ResouceController;
use App\Http\Controllers\Controller;
use App\Models\HT00\Category;
use App\Models\HT00\PostApartment;
use App\Models\HT00\PostCategory;
use App\Models\HT00\PostUser;
use App\Services\HT00\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends ResouceController
{
    function __construct(PostService $service)
    {
        $this->middleware('auth');
        parent::__construct($service, array('active' => 'category', 'group' => 'configuration'));
    }
    public function create(){
        $categories = Category::where('status',0)->where('type',0)->get();
        return view('posts.add')->with(['categories'=>$categories]);
    }
    public function store(Request $request){
        $data=[];
        if (!$request->has('id')){
            $data['slug'] = Str::slug((string)$request->title, '-') . time();
        }
        if ($request->has('avata')) {
            $name = time() . "-" . Auth::id() . ".png";
            $request->avata->move(public_path('storage'), $name);
            $data['avata'] = '/public/storage/' . $name;
            return $data['avata'];
        }
        $posts=parent::storeRequest($request,$data);
        if ($request->has('categories')){
            foreach ($request->categories as $category){
                $arr = explode("_", $category);
                PostCategory::updateOrCreate(
                    ['post_id'=>$posts->id,'category_id'=>$arr[0]],
                    ['modify_by'=>Auth::id(),'status'=>$arr[1]]
                );
                if($arr[1]=='1') {return $arr;}
            }
        }
        if ($request->has('apartments')){
            foreach ($request->apartments as $apartment){
                $arr = explode("_", $apartment);
                PostApartment::updateOrCreate(
                    ['post_id'=>$posts->id,'apartment_id'=>$arr[0]],
                    ['modify_by'=>Auth::id(),'role'=>$arr[1]]
                );
            }
        }
        if ($request->has('users')){
            foreach ($request->users as $user){
                $arr = explode("_", $user);
                PostUser::updateOrCreate(
                    ['post_id'=>$posts->id,'user_id'=>$arr[0]],
                    ['modify_by'=>Auth::id(),'role'=>$arr[1]]
                );
            }
        }
        return $posts;
    }
}

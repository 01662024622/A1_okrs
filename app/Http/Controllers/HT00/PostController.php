<?php

namespace App\Http\Controllers\HT00;

use App\Http\Controllers\Base\ResouceController;
use App\Http\Controllers\Controller;
use App\Models\HT00\Category;
use App\Models\HT00\Post;
use App\Models\HT00\PostApartment;
use App\Models\HT00\PostCategory;
use App\Models\HT00\PostUser;
use App\Services\HT00\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends ResouceController
{
    function __construct(PostService $service)
    {
        $this->middleware('auth');
        parent::__construct($service, array('active' => 'posts', 'group' => 'configuration'));
    }
    public function create(){
        $categories = Category::where('status',0)->where('type',0)->get();
        return view('posts.add')->with(['categories'=>$categories]);
    }
    public function edit($id){
        $categories = Category::where('status',0)->where('type',0)->get();
        $post = Post::find($id);
        $post->categories->makeHidden(['laravel_through_key']);
        $post->users->makeHidden(['laravel_through_key']);
        $post->apartments->makeHidden(['laravel_through_key']);

        return view('posts.edit')->with(['categories'=>$categories,'post'=>$post]);
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
        }
        $posts=parent::storeRequest($request,$data);
        if ($request->has('categories')){
            foreach ($request->categories as $category){
                $arr = explode("_", $category);
                PostCategory::updateOrCreate(
                    ['post_id'=>$posts->id,'category_id'=>$arr[0]],
                    ['modify_by'=>Auth::id(),'status'=>$arr[1]]
                );
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
    public function show($slug){
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
        $post=Post::where('slug',$slug)->first();
        if (in_array($post->id,$array)) {
            return view('posts.show',['post'=>$post]);
        }else return view('errors.404');
    }
}

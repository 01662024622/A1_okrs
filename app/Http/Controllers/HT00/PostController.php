<?php

namespace App\Http\Controllers\HT00;

use App\Http\Controllers\Base\ResouceController;
use App\Http\Controllers\Controller;
use App\Models\HT00\Category;
use App\Services\HT00\PostService;
use Illuminate\Http\Request;

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
}

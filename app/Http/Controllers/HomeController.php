<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where('status',1)->get();
        return view('website.home')->with('posts',$posts);
    }

    public function map()
    {
        $posts = Post::where('status',1)->get();
        $cities = Category::all();
        return view('website.map')->with('posts',$posts)->with('cities',$cities);
    }
    public function qr(){

        return view('website.qr');
    }

    public function admin()
    {
        return view('home');
    }
}

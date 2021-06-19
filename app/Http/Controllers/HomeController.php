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

    public function map(Request $request)
    {
        $post_query = Post::where('status',1);
        if($request->query('city'))
        {
            $post_query->where('category_id',$request->query('city'));
            $selected_city = Category::find($request->query('city'));
        }
        $posts = $post_query->get();
        $cities = Category::all();
        return view('website.map')->with('posts',$posts)->with('cities',$cities)->with('selected_city',$selected_city ?? "");
    }
    public function qr(){

        return view('website.qr');
    }

    public function admin()
    {
        $posts = Post::where('status',1)->paginate(10);
        $lastmonth_posts = Post::whereDate('created_at','>=',\Carbon\Carbon::now()->subMonth(1))->get();
        return view('home')->with('posts',$posts)->with('lastmonth_posts',$lastmonth_posts);
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:view-post');
        $this->middleware('permission:create-post', ['only' => ['create','store']]);
        $this->middleware('permission:update-post', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy-post', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $posts = Post::with(['user','category'])->where('post_title', 'like', '%'.$request->search.'%')->paginate(setting('record_per_page', 15));
        }else{
            $posts = Post::with(['user','category'])->paginate(setting('record_per_page', 15));
        }
        $title =  'ادارة الاثار';
        return view('post.index', compact('posts','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'اضافة اثر';
        $categories = Category::pluck('category_name', 'id');
        return view('post.create', compact('categories', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);
        $post = $request->except('featured_image','section_title','section_body');
        if ($request->featured_image) {
            $post['featured_image'] = parse_url($request->featured_image, PHP_URL_PATH);
        }

        $sections = [];

        foreach($request->get('section_body') as $key => $section){
            $sec = new Section(['content' => $section ]);
            $sec->type = 'p';
            $sections[] = $sec;
        }

        $new_post = Post::create($post);
        $new_post->sections()->saveMany($sections);

        flash('Post created successfully!')->success();
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->with(['category','user','sections']);
        $post->increment('views');
        $related = Post::where('status',1)->take(3)->get();
        return view('website.post')->with('post',$post)->with('related',$related);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $title = "Post Details";
        $post->with(['category','user','sections']);
        $categories = Category::pluck('category_name', 'id');
        return view('post.edit', compact('title', 'categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $postdata = $request->except('featured_image','section_title','section_body');
        if ($request->featured_image) {
            $postdata['featured_image'] = parse_url($request->featured_image, PHP_URL_PATH);
        }

        $sections = [];

        foreach($request->get('section_body') as $key => $section){
            $sec = new Section(['content' => $section ]);
            $sec->type = 'p';
            $sections[] = $sec;
        }


        $post->update($postdata);
        $post->sections()->delete();
        $post->sections()->saveMany($sections);
        flash('Post updated successfully!')->success();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        flash('Post deleted successfully!')->info();
        return back();
    }
}

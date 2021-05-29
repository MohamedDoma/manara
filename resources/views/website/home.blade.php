@extends('website.layout')
@section('content')
    <main class="main-content">
        <div class="container-fluid photos">
            <div class="row align-items-stretch no-margin">
                @foreach($posts as $post)
                    @if($loop->even)
                    <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up">

                        <a href="{{route('post.show', $post)}}" class="d-block photo-item">
                            <img src="@if($post->featured_image) {{$post->featured_image}} @else https://via.placeholder.com/500 @endif" alt="Image" class="img-fluid">
                            <div class="photo-text-more">
                                <div class="photo-text-more">
                                    <h3 class="heading">{{$post->post_title}}</h3>

                                    <span class="meta">{{ Str::substr($post->post_body,0,50) }} ...</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @else
                    <div class="col-6 col-md-6 col-lg-8" data-aos="fade-up" data-aos-delay="100">
                        <a href="{{route('post.show', $post)}}" class="d-block photo-item">
                            <img src="@if($post->featured_image) {{$post->featured_image}} @else https://via.placeholder.com/500 @endif " alt="Image" class="img-fluid">
                            <div class="photo-text-more">
                                <div class="photo-text-more">
                                    <h3 class="heading">{{$post->post_title}}</h3>

                                    <span class="meta">{{ Str::substr($post->post_body,0,50) }} ...</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @endforeach


            </div>

        </div>
    </main>
    @endsection

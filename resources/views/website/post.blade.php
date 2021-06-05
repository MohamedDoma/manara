@extends('website.layout')
@section('content')
    <main class="main-content">
        <div class="container d-flex justify-content-center">
            <div class="col-md-10 p-4 " style="" data-aos="fade-top">
                <img src="{{ $post->featured_image }}" alt="Image" class="img-fluid">

            </div>
        </div>
        <div class="container bg-white p-0" style="/*transform: translateY(-200px)*/">
            <div class="col-md-6 text-center p-4 d-flex justify-content-between" style="margin:0 auto;">
                <button class="btn btn-primary">
                    خيار
                </button>

            </div>
            <div class="col-md-12 text-center p-4" >
                <h1>{{ $post->title }}</h1>
            </div>
            <div class="col-md-12 text-center p-4" data-aos="fade-up">
                <p>
                    {{ $post->post_body }}</p>
                    @foreach($post->sections as $section)
                        <h2 class="p-4">{{$section->post_id}}</h2>
                        <p>
                           {{ $section->content}}
                        </p>
                @endforeach
            </div>
            <div class="col-md-12 text-center" data-aos="fade-up">
                <h1>الصور</h1>
                <div class="owl-carousel owl-theme">
                    <img src="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" />
                    <img src="http://lokeshdhakar.com/projects/lightbox2/images/image-2.jpg" />
                    <img src="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" />
                    <img src="http://lokeshdhakar.com/projects/lightbox2/images/image-2.jpg" />
                    <img src="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" />
                    <img src="http://lokeshdhakar.com/projects/lightbox2/images/image-2.jpg" />
                </div>
            </div>
            @if($post->know)
                <div class="col-md-12 text-center p-0 " data-aos="fade-up">
                    <h1 class="p-3">هل تعلم</h1>
                    <div class="bg-secondary p-4 text-white">{{$post->know}}</div>
                </div>
            @endif
            @if($related)
            <div class="col-md-12 text-center p-0 " data-aos="fade-left">
                <h1 class="p-3 ">معالم اخرى</h1>
                <div class="container photos">
                    <div class="row">
                        @foreach($related as $relate)
                            <div class="col-md-4">
                                <a href="{{route('post.show', $relate)}}" class="d-block photo-item">
                                    <img src="{{$relate->featured_image}}" alt="Image" class="img-fluid">
                                    <div class="photo-text-more">
                                        <h3 class="heading">{{$relate->post_title}}</h3>
                                        <span class="meta">{{substr($relate->post_body,0,50)}}</span>
                                    </div>
                                </a>
                            </div>

                        @endforeach

                    </div>
                </div>

            </div>
            @endif
        </div>
    </main>
@endsection

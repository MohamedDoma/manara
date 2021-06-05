@extends('layouts.app')
@push('pg_btn')
    <a href="{{route('post.index')}}" class="btn btn-sm btn-neutral">عرض جميع الاثار</a>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => ['post.update', $post], 'method'=>'put', 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">معلومات عن الاثر</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {{ Form::label('post_title', 'عنوان الاثر', ['class' => 'form-control-label']) }}
                                        {{ Form::text('post_title', $post->post_title, ['class' => 'form-control']) }}
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('category_id', 'المدينة', ['class' => 'form-control-label']) }}
                                        {{ Form::select('category_id', $categories, $post->category_id, [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Select category...']) }}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('featured_image', 'الصورة الرئيسية', ['class' => 'form-control-label d-block']) }}
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                              <a id="uploadFile" data-input="thumbnail" data-preview="holder" class="btn btn-secondary">
                                                <i class="fa fa-picture-o"></i> اضافة صورة
                                              </a>
                                            </span>
                                            <input id="thumbnail" class="form-control d-none" type="text" name="featured_image">
                                        </div>
                                    </div>
                                </div>

                                        <div class="col-md-2">
                                            @if ($post->featured_image)
                                                <a href="{{ asset($post->featured_image) }}" target="_blank">
                                                    <img alt="Image placeholder"
                                                    class="avatar avatar-xl  "
                                                    data-toggle="tooltip" data-original-title="{{ $post->name }} Logo"
                                                    src="{{ asset($post->featured_image) }}">
                                                </a>
                                            @endif
                                    </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        {{ Form::label('post_body', 'معلومات الاثر', ['class' => 'form-control-label']) }}
                                        {!! Form::textarea('post_body', $post->post_body, ['id'=>"summernote", 'class'=> 'form-control',]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                    <h6 class="heading-small text-muted mb-4">الاقسام</h6>
                    <div class="pl-lg-4">
                            <div class="row ccc">
                                <a href="#" class="btn btn-sm btn-neutral add">اضافة قسم</a>

                                @foreach($post->sections as $section)

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{ Form::label('section_title', 'عنوان القسم', ['class' => 'form-control-label']) }}
                                            {{ Form::text('section_title[]', $post->post_title, ['class' => 'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('section_body', 'محتوى القسم', ['class' => 'form-control-label']) }}
                                            {!! Form::textarea('section_body[]', $section->content, ['id'=>"summernote", 'class'=> 'form-control',]) !!}
                                        </div>
                                        <a href="#" class="remove_field">Remove</a>
                                    </div>

                                @endforeach
                            </div>
                        </div>

                        <hr class="my-4" />
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="status" value="1" {{ $post->status ? 'checked' : ''}}  class="custom-control-input" id="status">
                                        {{ Form::label('status', 'مفعل', ['class' => 'custom-control-label']) }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    {{ Form::submit('اضافة اثر', ['class'=> 'mt-5 btn btn-primary']) }}
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/summernote-bs4.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

<script>
    jQuery(document).ready(function() {
        jQuery('#summernote').summernote({
            height: 150,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
              ]

        });
        jQuery('#uploadFile').filemanager('file');
    });
  </script>
<script>
    $(document).ready(function()
    {
        var max_fields = 100;
        var wrapper = $(".ccc");
        var add_button = $(".add");

        var x = 1;

        $(add_button).click(function(e)
        {
            e.preventDefault();
            if(x < max_fields)
            {
                x++;
                $(wrapper).append('<div class="col-lg-12"> <div class="form-group"> {{ Form::label("section_title", "عنوان القسم", ["class" => "form-control-label"]) }} {{ Form::text("section_title[]", $post->post_title, ["class" => "form-control"]) }} </div> <div class="form-group"> {{ Form::label("section_body", "محتوى القسم", ["class" => "form-control-label"]) }} {!! Form::textarea("section_body[]", $post->post_body, ["id"=>"summernote", "class"=> "form-control",]) !!} </div> <a href="#" class="remove_field">Remove</a> </div> ');
            }
        });

        $(wrapper).on("click", ".remove_field", function(e){
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>

@endpush

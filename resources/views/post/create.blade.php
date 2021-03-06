@extends('layouts.app')
@push('pg_btn')
<a href="{{route('post.index')}}" class="btn btn-sm btn-neutral">عرض جميع الاثار</a>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-5">
            <div class="card-body">
                {!! Form::open(['route' => 'post.store', 'files' => true]) !!}
                <h6 class="heading-small text-muted mb-4">معلومات عن الاثر</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {{ Form::label('post_title', 'عنوان الاثر', ['class' => 'form-control-label']) }}
                                {{ Form::text('post_title', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                {{ Form::label('category_id', 'المدينة', ['class' => 'form-control-label']) }}
                                {{ Form::select('category_id', $categories, null, [ 'class'=> 'selectpicker form-control', 'placeholder' => 'اختيار مدينة']) }}
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
                                <div id="holder"><img style="height: 5rem;" src="#"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                {{ Form::label('post_body', 'معلومات الاثر', ['class' => 'form-control-label']) }}
                                {!! Form::textarea('post_body', null, ['id'=>"summernote", 'class'=> 'form-control',]) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">الاقسام</h6>

                <div class="pl-lg-4">
                    <div class="row ccc">
                        <a href="#" class="btn btn-sm btn-neutral add">اضافة قسم</a>

                        <!-- <div class="col-lg-12">

                      <div class="col-lg-12">
                            <div class="form-group">
                                {{ Form::label('post_title', 'عنوان القسم', ['class' => 'form-control-label']) }}
                                {{ Form::text('post_title', "", ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('post_body', 'محتوى القسم', ['class' => 'form-control-label']) }}
                                {!! Form::textarea('post_body', "", ['id'=>"summernote", 'class'=> 'form-control',]) !!}
                            </div>
                        </div> -->
                    </div>
                </div>

                <hr class="my-4" />

                <h6 class="heading-small text-muted mb-4">وحدة</h6>

                <div class="pl-lg-4">
                    <div class="row kkk">
                        <a href="#" class="btn btn-sm btn-neutral add_key"> اضافة وحدة</a>

                        <div class="col-lg-12">
                            <!-- <div class="form-group">
                                {{ Form::label('post_title', '', ['class' => 'form-control-label']) }}
                                {{ Form::text('post_title', "", ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('post_title', '', ['class' => 'form-control-label']) }}
                                {{ Form::text('post_title', "", ['class' => 'form-control']) }}
                            </div> -->
                        </div>
                    </div>
                </div>

                <hr class="my-4" />

                <h6 class="heading-small text-muted mb-4">الصور</h6>
                <div class="pl-lg-4">
                    <div class="row ppp">
                        <a href="#" class="btn btn-sm btn-neutral add_photo">اضافة صورة</a>

                    </div>
                </div>
                <hr class="my-4" />

                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" value="1" class="custom-control-input" id="status">
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
                $(wrapper).append('<div class="col-lg-12"> <div class="form-group"> {{ Form::label("section_title", "عنوان القسم", ["class" => "form-control-label"]) }} {{ Form::text("section_title[]", "", ["class" => "form-control"]) }} </div> <div class="form-group"> {{ Form::label("section_body", "محتوى القسم", ["class" => "form-control-label"]) }} {!! Form::textarea("section_body[]", "", ["id"=>"summernote", "class"=> "form-control",]) !!} </div> <a href="#" class="remove_field">Remove</a> </div> ');
            }
        });

        $(wrapper).on("click", ".remove_field", function(e){
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>

<script>
    $(document).ready(function()
    {
        var max_keys = 100;
        var wrapper = $(".kkk");
        var add_key = $(".add_key");

        var x = 1;

        $(add_key).click(function(e){
            e.preventDefault();
            if(x < max_keys)
            {
                x++;
                $(wrapper).append('<div class="col-lg-12"> <div class="form-group"> {{ Form::label("الوحدة", "", ["class" => "form-control-label"]) }}{{ Form::text("keyword[]", "", ["class" => "form-control"]) }}</div><div class="form-group">{{ Form::label("الوحدة تعرض", "", ["class" => "form-control-label"]) }}{{ Form::text("keyword_content[]", "", ["class" => "form-control"]) }} </div> <a href="#" class="remove_field">Remove</a> </div>')
            }
        });

        $(wrapper).on("click", ".remove_field", function(e){
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>

<script>
    $(document).ready(function() {
        var max_photo_field = 100;
        var photo_wrapper = $(".ppp");
        var add_photo_button = $(".add_photo");

        var i = 1;

        $(add_photo_button).click(function(e) {
            e.preventDefault();
            if (i < max_photo_field) {
                i++;
                $(photo_wrapper).append('<div class="col-md-2"> <div class="input-group"><span class="input-group-btn"><a id="uploadFile'+i+'" data-input="thumbnail'+i+'" data-preview="holder'+i+'" class="btn btn-secondary"><i class="fa fa-picture-o"></i> اضافة صورة</a></span><input id="thumbnail'+i+'" class="form-control d-none" type="text" name="images[]"></div>  <a href="#" class="remove_photo_field">Remove</a><div class="col-md-2"><div id="holder'+i+'"><img style="height: 5rem;" src="#"></div></div></div>');
                $('#uploadFile'+i).filemanager('file');
            }
        });

        $(photo_wrapper).on("click", ".remove_photo_field", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            i--;
        })
    });
</script>
@endpush

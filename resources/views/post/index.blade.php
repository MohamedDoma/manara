@extends('layouts.app')
@push('pg_btn')
    @can('create-post')
        <a href="{{ route('post.create') }}" class="btn btn-sm btn-neutral">اضافة اثر جديد</a>
    @endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">جميع الاثار</h3>
                        </div>
                        <div class="col-lg-4">
                            {!! Form::open(['route' => 'post.index', 'method'=>'get']) !!}
                            <div class="form-group mb-0">
                                {{ Form::text('search', request()->query('search'), ['class' => 'form-control form-control-sm', 'placeholder'=>'البحث']) }}
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div>
                            <table class="table table-hover align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">عنوان الاثر</th>
                                    <th scope="col">المدينة </th>
                                    <th scope="col">مفعل</th>
                                    <th scope="col">المستخدم المنشئ</th>
                                    <th scope="col">الصورة</th>
                                    <th scope="col" class="text-center">تحكم</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($posts as $post)
                                    <tr>
                                        <th scope="row">
                                            <div class="mx-w-440 d-flex flex-wrap">
                                                {{ $post->post_title }}
                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{ $post->category->category_name }}
                                        </td>
                                        <td>
                                            @if($post->status)
                                                <span class="badge badge-pill badge-lg badge-success">مفعل</span>
                                            @else
                                                <span class="badge badge-pill badge-lg badge-danger">غير مفعل</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{$post->user->name}}
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                @if ($post->featured_image)
                                                    <img alt="Image placeholder"
                                                         class="avatar avatar-xl"
                                                         data-toggle="tooltip" data-original-title="{{$post->post_title}}"
                                                         src="{{ asset($post->featured_image) }}">
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            @can('destroy-post')
                                                {!! Form::open(['route' => ['post.destroy', $post],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}
                                            @endcan
                                            @can('view-post')
                                                <a class="btn btn-primary btn-sm m-1" data-toggle="tooltip" data-placement="top" title="عرض" href="{{route('post.show', $post)}}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            @endcan
                                            @can('update-post')
                                                <a class="btn btn-info btn-sm m-1" data-toggle="tooltip" data-placement="top" title="تعديل" href="{{route('post.edit',$post)}}">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                            @endcan
                                            @can('destroy-post')
                                                <button type="submit" class="btn delete btn-danger btn-sm m-1" data-toggle="tooltip" data-placement="top" title="حذف" href="">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot >
                                <tr>
                                    <td colspan="6">
                                        {{$posts->links()}}
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        jQuery(document).ready(function(){
            $('.delete').on('click', function(e){
                e.preventDefault();
                let that = jQuery(this);
                jQuery.confirm({
                    icon: 'fas fa-wind-warning',
                    closeIcon: true,
                    title: 'متاكد من الحذف !',
                    content: 'لا يمكن الرجوع عن هذا الفعل.!',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        confirm: function () {
                            that.parent('form').submit();
                            //$.alert('Confirmed!');
                        },
                        cancel: function () {
                            //$.alert('Canceled!');
                        }
                    }
                });
            })
        })

    </script>
@endpush

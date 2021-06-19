@extends('layouts.app')
@push('pg_btn')
@can('create-category')
    <a href="{{ route('category.create') }}" class="btn btn-sm btn-neutral">إنشاء فئة جديدة</a>
@endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="mb-0">جميع الفئات</h3>
                        </div>
                        <div class="col-lg-4">
                    {!! Form::open(['route' => 'users.index', 'method'=>'get']) !!}
                        <div class="form-group mb-0">
                        {{ Form::text('search', request()->query('search'), ['class' => 'form-control form-control-sm', 'placeholder'=>'بحث المستخدمين']) }}
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
                                    <th scope="col">الإسم</th>
                                    <th scope="col">أضيفت من قبل</th>
                                    <th scope="col">حالة</th>
                                    <th scope="col">أنشئت في</th>
                                    <th scope="col" class="text-center">عمل</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">
                                            {{$category->category_name}}
                                        </th>
                                        <td class="budget">
                                            {{$category->user->name}}
                                        </td>
                                        <td>
                                            @if($category->status)
                                                <span class="badge badge-pill badge-lg badge-success">نشط</span>
                                            @else
                                                <span class="badge badge-pill badge-lg badge-danger">إبطال</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{$category->created_at->diffForHumans()}}
                                        </td>
                                        <td class="text-center">
                                            @can('destroy-category')
                                            {!! Form::open(['route' => ['category.destroy', $category],'method' => 'delete',  'class'=>'d-inline-block dform']) !!}
                                            @endcan

                                            @can('update-category')
                                            <a class="btn btn-info btn-sm m-1" data-toggle="tooltip" data-placement="top" title="تحرير تفاصيل الفئة" href="{{route('category.edit',$category)}}">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            @endcan
                                            @can('destroy-category')
                                                <button type="submit" class="btn delete btn-danger btn-sm m-1" data-toggle="tooltip" data-placement="top" title="حذف الفئة" href="">
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
                                        {{$categories->links()}}
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
                    title: 'هل أنت واثق!',
                    content: 'You can not undo this action.!',
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

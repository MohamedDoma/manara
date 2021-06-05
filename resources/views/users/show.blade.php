@extends('layouts.app')
@push('pg_btn')
    @can('update-user')
        <a class="btn btn-info btn-sm m-1" data-toggle="tooltip" data-placement="top" title="تحرير تفاصيل المستخدم" href="{{route('users.edit',$user)}}">
            <i class="fa fa-edit" aria-hidden="true"></i> تحرير المستخدم
        </a>
    @endcan
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-1">
                            الإسم
                        </div>
                        <div class="col-sm-3">
                            <strong>{{ $user->name }}</strong>
                        </div>
                        <div class="col-sm-8 text-right">
                            @if ($user->profile_photo)
                                <a href="{{ asset($user->profile_photo) }}" target="_blank">
                                    <img width="100" height="100" class="img-fluid rounded-pill" src="{{ asset($user->profile_photo) }}" alt="">
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1">
                            البريد الإلكتروني
                        </div>
                        <div class="col-sm-3">
                            <strong>{{ $user->email }}</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1">
                            رقم الهاتف
                        </div>
                        <div class="col-sm-3">
                            <strong>{{ $user->phone_number }}</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1">
                            الدور
                        </div>
                        <div class="col-sm-3">
                            @foreach ($user->roles as $role)
                                <strong>{{ $role->name }}</strong>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1">
                            الحالة
                        </div>
                        <div class="col-sm-3">
                            {{ $user->status ? 'Active' : 'Disable'}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

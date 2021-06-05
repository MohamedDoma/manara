@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    {!! Form::open(['route' => ['profile.update', $user], 'files' => true]) !!}
                    <h6 class="heading-small text-muted mb-4">الملف الشخصي</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('name', 'الإسم', ['class' => 'form-control-label']) }}
                                        {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {{ Form::label('email', 'البريد الإلكتروني', ['class' => 'form-control-label']) }}
                                        {{ Form::email('email', $user->email, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('phone_number', 'رقم الهاتف', ['class' => 'form-control-label']) }}
                                        {{ Form::text('phone_number', $user->phone_number, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('profile_photo', 'الصورة', ['class' => 'form-control-label d-block']) }}
                                        <div class="d-inline">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                  <a id="uploadFile" data-input="thumbnail" data-preview="holder" class="btn btn-secondary">
                                                    <i class="fa fa-picture-o"></i> اختر الشعار
                                                  </a>
                                                </span>
                                                <input id="thumbnail" class="form-control d-none" type="text" name="profile_photo">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    @if ($user->profile_photo)
                                        <a href="{{ asset($user->profile_photo) }}" target="_blank">
                                            <img alt="Image placeholder"
                                            class="avatar avatar-xl  rounded-circle"
                                            data-toggle="tooltip" data-original-title="{{ $user->name }} Logo"
                                            src="{{ asset($user->profile_photo) }}">
                                        </a>
                                    @endif
                            </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">معلومات كلمة المرور</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('password', 'كلمه المرور', ['class' => 'form-control-label']) }}
                                        {{ Form::password('password', ['class' => 'form-control']) }}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('password_confirmation', 'تأكيد كلمة المرور', ['class' => 'form-control-label']) }}
                                        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    {{ Form::submit('إرسال', ['class'=> 'mt-5 btn btn-primary']) }}
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

@push('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        jQuery(document).ready(function(){
            jQuery('#uploadFile').filemanager('file');
        })
    </script>
@endpush

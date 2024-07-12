@extends('admin.layouts.master')

@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/dropify/css/dropify.min.css')}}"> 

<link href="{{asset('admin-assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">

<link href="{{asset('admin-assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" type="text/css" />

@endpush

@section('main')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row my-1">
                <div class="col-lg-4 col-12"></div>
                <div class="col-lg-4 col-12">

                    {{ html()->form('PUT', route('admin.update-password', Auth::guard('admin')->user()->id))->attribute('files', true)->open() }}
                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                            {{ html()->label('Current Password')->for('current_password') }}
                            {{ html()->password('current_password')->class('form-control')->placeholder('Current Password') }}
                            <small class="text-danger">{{ $errors->first('current_password') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                            {{ html()->label('New Password')->for('new_password') }}
                            {{ html()->password('new_password')->class('form-control')->placeholder('New Password') }}
                            <small class="text-danger">{{ $errors->first('new_password') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                            {{ html()->label('Confirm Password')->for('new_password_confirmation') }}
                            {{ html()->password('new_password_confirmation')->class('form-control')->placeholder('Confirm Password') }}
                            <small class="text-danger">{{ $errors->first('new_password_confirmation') }}</small>
                        </div>

                        <div class="form-group" style="margin-top: 40px; margin-bottom: 0;">
                            {{ html()->submit('Change Password')->class('btn btn-danger') }}
                        </div>
                    {{ html()->form()->close() }}

                </div>
                <div class="col-lg-4 col-12"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{asset('admin-assets/dropify/js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/dropify/dropify.js')}}"></script>
<script src="{{asset('admin-assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('admin-assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
@endpush

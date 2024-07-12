@extends('admin.layouts.master')

@push('links')
@endpush

@php
    $admin = \Auth::guard('admin')->user();
@endphp

@section('main')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ Str::title(str_replace('-', ' ', request()->segment(2))) }}</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg profile-setting-img">
        <img src="{{ asset(getAdmin('cover_photo') ?? 'assets/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
        <div class="overlay-content">
            <div class="text-end p-3">
                <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                    {{ html()->form('PUT', route('admin.profile.cover.photo.update', $admin->id))
                        ->attribute('files', true)
                        ->id('update_profile_cover_photo')
                        ->open() }}
                    {{ html()->file('cover_photo')
                        ->id('profile-foreground-img-file-input')
                        ->class('profile-foreground-img-file-input')
                        ->attribute('onchange', 'updateProfileCoverPhoto(this)') }}
                    {{ html()->form()->close() }}
                    <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                        <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xxl-3">
        <div class="card mt-n5">
            <div class="card-body p-4">
                <div class="text-center">
                    <div class="profile-user position-relative d-inline-block mx-auto mb-4">
                        <img src="{{ asset(getAdmin('avatar') ?? 'assets/images/users/avatar-1.jpg') }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                            {{ html()->form('PUT', route('admin.profile.photo.update', $admin->id))
                                ->attribute('files', true)
                                ->id('update_profile_photo')
                                ->open() }}
                            {{ html()->file('avatar')
                                ->id('profile-img-file-input')
                                ->class('profile-img-file-input')
                                ->attribute('onchange', 'updateProfilePhoto(this)') }}
                            {{ html()->form()->close() }}
                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body">
                                    <i class="ri-camera-fill"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                    <h5 class="fs-16 mb-1">{{ getAdmin('name') }}</h5>
                    <p class="text-muted mb-0">{{ getAdmin('role') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-9">
        <div class="card mt-xxl-n5">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personal_details" role="tab">
                            <i class="bx bxs-user"></i> Personal Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#change_password" role="tab">
                            <i class="bx bxs-key"></i> Change Password
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="personal_details" role="tabpanel">
                        {{ html()->form('PUT', route('admin.profile.update'))
                            ->attribute('files', true)
                            ->id('updateProfile')
                            ->open() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    {{ html()->label('Name')->for('name') }}
                                    {{ html()->text('name', $admin->name)
                                        ->class('form-control')
                                        ->placeholder('Name') }}
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {{ html()->label('Email')->for('email') }}
                                    {{ html()->email('email', $admin->email)
                                        ->class('form-control')
                                        ->attribute('readonly', 'readonly')
                                        ->placeholder('eg: foo@bar.com') }}
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                                    {{ html()->label('Mobile No.')->for('mobile_no') }}
                                    {{ html()->text('mobile_no', $admin->mobile)
                                        ->class('form-control')
                                        ->placeholder('Mobile No.') }}
                                    <small class="text-danger">{{ $errors->first('mobile_no') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                    {{ html()->label('Gender')->for('gender') }}
                                    {{ html()->select('gender', ['male' => 'Male', 'female' => 'Female'], $admin->gender)
                                        ->id('gender')
                                        ->class('form-control')
                                        ->placeholder('Gender') }}
                                    <small class="text-danger">{{ $errors->first('gender') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                    {{ html()->label('Date Of Birth')->for('date_of_birth') }}
                                    {{ html()->text('date_of_birth', $admin->date_of_birth)
                                        ->class('form-control')
                                        ->placeholder('Date Of Birth') }}
                                    <small class="text-danger">{{ $errors->first('date_of_birth') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                    {{ html()->label('State')->for('state') }}
                                    {{ html()->text('state', $admin->state)
                                        ->class('form-control')
                                        ->placeholder('State') }}
                                    <small class="text-danger">{{ $errors->first('state') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                    {{ html()->label('City')->for('city') }}
                                    {{ html()->text('city', $admin->city)
                                        ->class('form-control')
                                        ->placeholder('City') }}
                                    <small class="text-danger">{{ $errors->first('city') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                    {{ html()->label('Zipcode')->for('zipcode') }}
                                    {{ html()->text('zipcode', $admin->pincode)
                                        ->class('form-control')
                                        ->placeholder('Zipcode') }}
                                    <small class="text-danger">{{ $errors->first('zipcode') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3 form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    {{ html()->label('Address')->for('address') }}
                                    {{ html()->textarea('address', $admin->address)
                                        ->class('form-control')
                                        ->placeholder('Address')
                                        ->rows(3) }}
                                    <small class="text-danger">{{ $errors->first('address') }}</small>
                                </div>
                                <div class="mb-3 pb-2">
                                    <div class="mb-3 form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                                        {{ html()->label('BIO')->for('bio') }}
                                        {{ html()->textarea('bio', $admin->bio)
                                            ->class('form-control')
                                            ->placeholder('BIO')
                                            ->rows(3) }}
                                        <small class="text-danger">{{ $errors->first('bio') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 text-end">
                                {{ html()->button('Save Changes')->class('btn btn-primary') }}
                            </div>
                        </div>
                        {{ html()->form()->close() }}
                    </div>
                    <div class="tab-pane" id="change_password" role="tabpanel">
                        {{ html()->form('PUT', route('admin.update-password', Auth::guard('admin')->user()->id))->open() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                    {{ html()->label('Current Password')->for('current_password') }}
                                    {{ html()->password('current_password')
                                        ->class('form-control')
                                        ->placeholder('Current Password') }}
                                    <small class="text-danger">{{ $errors->first('current_password') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {{ html()->label('New Password')->for('password') }}
                                    {{ html()->password('password')
                                        ->class('form-control')
                                        ->placeholder('New Password') }}
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    {{ html()->label('Confirm New Password')->for('password_confirmation') }}
                                    {{ html()->password('password_confirmation')
                                        ->class('form-control')
                                        ->placeholder('Confirm New Password') }}
                                    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                </div>
                            </div>
                            <div class="col-lg-12 text-end">
                                {{ html()->button('Update Password')->class('btn btn-primary') }}
                            </div>
                        </div>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function updateProfileCoverPhoto(input) {
        var form = document.getElementById('update_profile_cover_photo');
        var formData = new FormData(form);
        axios.post(form.action, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(response => {
            location.reload();
        }).catch(error => {
            console.error(error);
        });
    }

    function updateProfilePhoto(input) {
        var form = document.getElementById('update_profile_photo');
        var formData = new FormData(form);
        axios.post(form.action, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(response => {
            location.reload();
        }).catch(error => {
            console.error(error);
        });
    }
</script>
@endpush

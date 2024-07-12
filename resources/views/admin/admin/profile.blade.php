@extends('admin.layouts.master')
<<<<<<< HEAD

@push('links')
@endpush

@php
    $admin = \Auth::guard('admin')->user();
@endphp

@section('main')

=======
@push('links')

@endpush
@php
$admin = \Auth::guard('admin')->user();
@endphp


@section('main')


>>>>>>> origin/main
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
<<<<<<< HEAD
            <h4 class="mb-sm-0">{{ Str::title(str_replace('-', ' ', request()->segment(2))) }}</h4>
=======
            <h4 class="mb-sm-0">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>
>>>>>>> origin/main
        </div>
    </div>
</div>
<!-- end page title -->

<<<<<<< HEAD
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
=======



<div class="position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg profile-setting-img">
        <img src="{{asset(getAdmin('cover_photo')??'assets/images/profile-bg.jpg')}}" class="profile-wid-img" alt="">
        <div class="overlay-content">
            <div class="text-end p-3">
                <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                    {!! Form::open(['route'=>['admin.profile.cover.photo.update',Auth::guard('admin')->user()->id],'method'=>'put', 'files'=>true, 'id'=>'update_profile_cover_photo']) !!}
                    <input onchange="updateProfileCoverPhoto($(this))" id="profile-foreground-img-file-input" type="file" name="cover_photo" class="profile-foreground-img-file-input">
                     {!! Form::close() !!}
>>>>>>> origin/main
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
<<<<<<< HEAD
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
=======
                    <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                        <img src="{{asset(getAdmin('avatar')??'assets/images/users/avatar-1.jpg')}}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                            {!! Form::open(['route'=>['admin.profile.photo.update',Auth::guard('admin')->user()->id],'method'=>'put', 'files'=>true, 'id'=>'update_profile_photo']) !!}
                            <input onchange="updateProfilePhoto($(this))" id="profile-img-file-input" name="avatar" type="file" class="profile-img-file-input">
                            {!! Form::close() !!}
>>>>>>> origin/main
                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body">
                                    <i class="ri-camera-fill"></i>
                                </span>
                            </label>
                        </div>
                    </div>
<<<<<<< HEAD
                    <h5 class="fs-16 mb-1">{{ getAdmin('name') }}</h5>
                    <p class="text-muted mb-0">{{ getAdmin('role') }}</p>
                </div>
            </div>
        </div>
    </div>
=======
                    <h5 class="fs-16 mb-1">{{getAdmin('name')}}</h5>
                    <p class="text-muted mb-0">{{getAdmin('role')}}</p>
                </div>
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
>>>>>>> origin/main
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
<<<<<<< HEAD
=======
                 
>>>>>>> origin/main
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="personal_details" role="tabpanel">
<<<<<<< HEAD
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
=======
                            {!! Form::open(['route'=>'admin.profile.update','method'=>'put', 'files'=>true, 'id'=>'updateFrofile']) !!}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        {!! Form::label('name', 'Name') !!}
                                        {!! Form::text('name', $admin->name, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                    </div>
                                </div>


                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        {!! Form::label('email', 'Email') !!}
                                        {!! Form::email('email', $admin->email, ['class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => 'eg: foo@bar.com']) !!}
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                                        {!! Form::label('mobile_no', 'Mobile No.') !!}
                                        {!! Form::text('mobile_no', $admin->mobile, ['class' => 'form-control', 'placeholder' => 'Mobile No.']) !!}
                                        <small class="text-danger">{{ $errors->first('mobile_no') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                        {!! Form::label('gender', 'Gender') !!}
                                        {!! Form::select('gender', ['male'=>'Male', 'female'=>'Female'], $admin->gender, ['id' => 'gender', 'class' => 'form-control', 'placeholder' => 'Gender']) !!}
                                        <small class="text-danger">{{ $errors->first('gender') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                              
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                        {!! Form::label('date_of_birth', 'Date Of Birth') !!}
                                        {!! Form::text('date_of_birth', $admin->date_of_birth, ['class' => 'form-control', 'placeholder' => 'Date Of Birth']) !!}
                                        <small class="text-danger">{{ $errors->first('date_of_birth') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                        {!! Form::label('state', 'State') !!}
                                        {!! Form::text('state', $admin->state, ['class' => 'form-control', 'placeholder' => 'State']) !!}
                                        <small class="text-danger">{{ $errors->first('state') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                        {!! Form::label('city', 'City') !!}
                                        {!! Form::text('city', $admin->city, ['class' => 'form-control', 'placeholder' => 'City']) !!}
                                        <small class="text-danger">{{ $errors->first('city') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                        {!! Form::label('zipcode', 'Zipcode') !!}
                                        {!! Form::text('zipcode', $admin->pincode, ['class' => 'form-control', 'placeholder' => 'Zipcode']) !!}
                                        <small class="text-danger">{{ $errors->first('zipcode') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        {!! Form::label('address', 'Address') !!}
                                        {!! Form::textarea('address', $admin->address, ['class' => 'form-control', 'placeholder' => 'Address','rows'=>3]) !!}
                                        <small class="text-danger">{{ $errors->first('address') }}</small>
                                    </div>
                                    <div class="mb-3 pb-2">
                                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                                            {!! Form::label('bio', 'BIO') !!}
                                            {!! Form::textarea('bio', $admin->bio, ['class' => 'form-control', 'placeholder' => 'BIO', 'rows'=>3]) !!}
                                            <small class="text-danger">{{ $errors->first('bio') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        {!! Form::button('Update Details', ['class' => 'btn btn-soft-secondary waves-effect waves-light','onClick'=>'updateDetails($(this))']) !!}
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        {!! Form::close() !!}
                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane" id="change_password" role="tabpanel">
                        {!! Form::open(['route'=>['admin.update-password',Auth::guard('admin')->user()->id],'method'=>'put', 'files'=>true, 'id'=>'change_password_form']) !!}
                            <div class="row g-2">
                                <div class="col-lg-4">
                                    <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                        {!! Form::label('current_password', 'Current Password') !!}
                                        {!! Form::password('current_password', ['class' => 'form-control', 'placeholder'=>'Current Password']) !!}
                                        <small class="text-danger">{{ $errors->first('current_password') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                        {!! Form::label('new_password', 'New Password') !!}
                                        {!! Form::password('new_password', ['class' => 'form-control', 'placeholder'=>'New Password']) !!}
                                        <small class="text-danger">{{ $errors->first('new_password') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                                        {!! Form::label('new_password_confirmation', 'Confirm Password') !!}
                                        {!! Form::password('new_password_confirmation', ['class' => 'form-control','placeholder'=>'Confirm Password']) !!}
                                        <small class="text-danger">{{ $errors->first('new_password_confirmation') }}</small>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot Password ?</a>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        {!! Form::button('Change Password', ['class' => 'btn btn-soft-secondary waves-effect waves-light','onClick'=>'changePassword($(this))']) !!}
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        {!! Form::close() !!}
                     
                    </div>
               
>>>>>>> origin/main
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
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
=======
    <!--end col-->
</div>
<!--end row-->

</div>





@endsection




@push('scripts')
<script type="text/javascript" src="{{asset('assets/js/pages/profile-setting.init.js')}}"></script>
<script type="text/javascript">
    
   

     function updateProfileCoverPhoto(element){
        var requestData,otpdata,data;
        formData = new FormData(document.querySelector('#update_profile_cover_photo'));

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url:"{{ route('admin.profile.cover.photo.update',Auth::guard('admin')->user()->id) }}",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success:function(response){
                console.log(response);
                Toastify({
                    text: response.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "success",

                }).showToast();
                //toastr.success(response.message); 
                document.querySelector('#update_profile_cover_photo').reset();
            },
            error:function(error){
                console.log(error);
                Toastify({
                    text: error.responseJSON.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "error",

                }).showToast();
                //toastr.error(error.responseJSON.message); 
                handleErrors(error.responseJSON);

            }
        });
    }



    function updateProfilePhoto(element){
        var requestData,otpdata,data;
        formData = new FormData(document.querySelector('#update_profile_photo'));

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url:"{{ route('admin.profile.photo.update',Auth::guard('admin')->user()->id) }}",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success:function(response){
                console.log(response);
                Toastify({
                    text: response.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "success",

                }).showToast();
                //toastr.success(response.message); 
                document.querySelector('#update_profile_photo').reset();
            },
            error:function(error){
                console.log(error);
                Toastify({
                    text: error.responseJSON.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "error",

                }).showToast();
                //toastr.error(error.responseJSON.message); 
                handleErrors(error.responseJSON);

            }
        });
    }


    function changePassword(element){
        var button = new Button(element);
        button.process();
        clearErrors();
        var requestData,otpdata,data;
        formData = new FormData(document.querySelector('#change_password_form'));

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url:'{{ route('admin.update-password',Auth::guard('admin')->user()->id) }}',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success:function(response){
                Toastify({
                    text: response.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "success",

                }).showToast();
                //toastr.success(response.message); 
                button.normal();
                document.querySelector('#change_password_form').reset();
            },
            error:function(error){
                Toastify({
                    text: error.responseJSON.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "error",

                }).showToast();
                //toastr.error(error.responseJSON.message); 
                button.normal();
                handleErrors(error.responseJSON);

            }
        });
    }


    function updateDetails(element){
        var button = new Button(element);
        button.process();
        clearErrors();
        var requestData,otpdata,data;
        formData = new FormData(document.querySelector('#updateFrofile'));

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url:'{{ route('admin.profile.update') }}',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success:function(response){
                Toastify({
                    text: response.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "success",

                }).showToast();
                toastr.success(response.message); 
                button.normal();
            },
            error:function(error){
                Toastify({
                    text: error.responseJSON.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "error",

                }).showToast();
                toastr.error(error.responseJSON.message); 
                button.normal();
                handleErrors(error.responseJSON);

            }
        });
    }
</script>
@endpush
>>>>>>> origin/main

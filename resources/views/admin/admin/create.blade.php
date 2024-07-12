@extends('admin.layouts.master')
<<<<<<< HEAD

=======
>>>>>>> origin/main
@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/libs/dropify/css/dropify.min.css')}}"> 
@endpush

<<<<<<< HEAD
@section('main')

=======



@section('main')


>>>>>>> origin/main
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>
            @can('add_admin')
            <div class="page-title-right">
<<<<<<< HEAD
                <a href="{{ route('admin.'.request()->segment(2).'.create') }}" class="btn-sm btn btn-primary btn-label rounded-pill">
=======
                <a href="{{ route('admin.'.request()->segment(2).'.create') }}"  class="btn-sm btn btn-primary btn-label rounded-pill">
>>>>>>> origin/main
                    <i class="bx bx-plus label-icon align-middle rounded-pill fs-16 me-2"></i>
                    Add {{Str::title(str_replace('-', ' ', request()->segment(2)))}}
                </a>
            </div>
            @endcan
<<<<<<< HEAD
=======

>>>>>>> origin/main
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
<<<<<<< HEAD
        

        {{ html()->form('POST', route('admin.'.request()->segment(2).'.store'))->attribute('files', true)->open() }}

        <div class="row">

            <div class="mb-3 form-group col-md-6">

                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ html()->label('Name')->for('name') }}
                            {{ html()->text('name')->class('form-control')->placeholder('Name') }}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>

                        <div class="mb-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{ html()->label('Email')->for('email') }}
                            {{ html()->email('email')->class('form-control')->placeholder('eg: foo@bar.com')->attribute('autocomplete', 'nope') }}
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>

                        <div class="mb-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{ html()->label('Password')->for('password') }}
                            {{ html()->password('password')->class('form-control')->placeholder('Password')->attribute('autocomplete', 'new-password') }}
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        </div>

                        <div class="mb-3 form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
                            {{ html()->label('Contact Number')->for('contact_number') }}
                            {{ html()->text('contact_number')->class('form-control')->placeholder('Contact Number') }}
                            <small class="text-danger">{{ $errors->first('contact_number') }}</small>
                        </div>

                        <div class="mb-3 form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            {{ html()->label('Gender')->for('gender') }}
                            {{ html()->select('gender', ['male' => 'Male', 'female' => 'Female'])->class('form-control')->placeholder('Gender') }}
                            <small class="text-danger">{{ $errors->first('gender') }}</small>
                        </div>

                        

                    </div>
                </div>
            </div>

            <div class="mb-3 form-group col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            {{ html()->label('Status')->for('status') }}
                            {{ html()->select('status', [1 => 'Active', 0 => 'Inactive'])->class('form-control')->id('admin_status')->placeholder('User Status') }}
                            <small class="text-danger">{{ $errors->first('status') }}</small>
                        </div>

                        <div class="mb-3 form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                            {{ html()->label('Date Of Birth')->for('date_of_birth') }}
                            <div class="input-group">
                                {{ html()->text('date_of_birth')->class('form-control')->attribute('data-date-format', 'd M, Y')->placeholder('Date Of Birth')->attribute('data-provider', 'flatpickr') }}
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                            <small class="text-danger">{{ $errors->first('date_of_birth') }}</small>
                        </div>

                        <div class="mb-3 form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            {{ html()->label('Role')->for('role') }}
                            {{ html()->select('role', App\Models\Role::pluck('name', 'id'))->class('form-control')->placeholder('Select Role') }}
                            <small class="text-danger">{{ $errors->first('role') }}</small>
                        </div>

                        <div class="mb-3 form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            {{ html()->label('Avatar')->for('avatar') }}
                            {{ html()->file('avatar')->class('dropify') }}
                            <small class="text-danger">{{ $errors->first('avatar') }}</small>
                        </div> 
                    </div>
                </div>

                <div class="mb-3 form-group" style="margin-top: 40px; margin-bottom: 0;">
                    {{ html()->submit('Create New User')->class('btn btn-soft-secondary waves-effect waves-light') }}
                </div>
            </div>


        </div>

        {{ html()->form()->close() }}
    </div>
</div>
=======
        <div class="card">
            <div class="card-body">

                {!! Form::open(['route'=>'admin.'.request()->segment(2).'.store', 'files'=>true]) !!}

                <div class="row">

                    <div class="form-group col-md-6">



                       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                           {!! Form::label('name', 'Name') !!}

                           {!! Form::text('name', null, ['class' => 'form-control',  'placeholder'=>'Name']) !!}

                           <small class="text-danger">{{ $errors->first('name') }}</small>

                       </div>





                       <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                           {!! Form::label('email', 'Email') !!}

                           {!! Form::email('email', null, ['class' => 'form-control',  'placeholder' => 'eg: foo@bar.com', 'autocomplete'=>'nope']) !!}

                           <small class="text-danger">{{ $errors->first('email') }}</small>

                       </div>





                       <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                           {!! Form::label('password', 'Password') !!}

                           {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'autocomplete'=>'new-password']) !!}

                           <small class="text-danger">{{ $errors->first('password') }}</small>

                       </div>





                       <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">

                           {!! Form::label('contact_number', 'Contact Number') !!}

                           {!! Form::text('contact_number', null, ['class' => 'form-control', 'placeholder' => 'Contact Number']) !!}

                           <small class="text-danger">{{ $errors->first('contact_number') }}</small>

                       </div>





                       <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">

                           {!! Form::label('gender', 'Gender') !!}

                           {!! Form::select('gender', ['male'=>'Male', 'female'=>'Female'], null, ['id' => 'gender', 'class' => 'form-control', 'placeholder' => 'Gender']) !!}

                           <small class="text-danger">{{ $errors->first('gender') }}</small>

                       </div>



                       <div class="form-group" style="margin-top: 40px; margin-bottom: 0;">



                        {!! Form::submit('Create New User', ['class' => 'btn btn-soft-secondary waves-effect waves-light']) !!}

                    </div>



                </div>





                <div class="form-group col-md-6">

                 <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">

                     {!! Form::label('status', 'Status') !!}

                     {!! Form::select('status', [1=>'Active', 0=>'Inactive'], null, ['id'=>'user_status','class' => 'form-control', 'placeholder' => 'User Staus']) !!}

                     <small class="text-danger">{{ $errors->first('status') }}</small>

                 </div>



                 <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">

                    {!! Form::label('date_of_birth', 'Date Of Birth') !!}

                    <div class="input-group">

                        {!! Form::text('date_of_birth', null, ['class' => 'form-control', 'data-date-format'=>'dd M, yyyy', 'data-provide'=>'datepicker',  'placeholder'=>'Date Of Birth', 'data-provider'=>'flatpickr', 'data-date-format'=>'d M, Y']) !!}
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                        </div>
                    </div>
                    <small class="text-danger">{{ $errors->first('date_of_birth') }}</small>

                </div>

                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">

                    {!! Form::label('role', 'Roll') !!}

                    {!! Form::select('role', App\Models\Role::pluck('name','id'), null, ['id' => 'role', 'class' => 'form-control', 'placeholder'=>'Select Role']) !!}

                    <small class="text-danger">{{ $errors->first('role') }}</small>

                </div>


                <div class="form-group {{ $errors->has('avatar') ? ' has-error' : '' }}">

                    {!! Form::label('avatar', 'Avatar') !!}

                    {!! Form::file('avatar', ['class'=>'dropify']) !!}

                    <small class="text-danger">{{ $errors->first('avatar') }}</small>

                </div> 
            </div>
        </div>

        {!! Form::close() !!} 
    </div>
</div>
</div>
</div>

>>>>>>> origin/main


@endsection

<<<<<<< HEAD
=======



>>>>>>> origin/main
@push('scripts')
<script src="{{asset('admin-assets/libs/dropify/js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/libs/dropify/dropify.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<<<<<<< HEAD
@endpush
=======

@endpush
>>>>>>> origin/main

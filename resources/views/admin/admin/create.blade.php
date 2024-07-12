@extends('admin.layouts.master')
@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/libs/dropify/css/dropify.min.css')}}"> 
@endpush




@section('main')


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>
            @can('add_admin')
            <div class="page-title-right">
                <a href="{{ route('admin.'.request()->segment(2).'.create') }}"  class="btn-sm btn btn-primary btn-label rounded-pill">
                    <i class="bx bx-plus label-icon align-middle rounded-pill fs-16 me-2"></i>
                    Add {{Str::title(str_replace('-', ' ', request()->segment(2)))}}
                </a>
            </div>
            @endcan

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
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



@endsection




@push('scripts')
<script src="{{asset('admin-assets/libs/dropify/js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/libs/dropify/dropify.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

@endpush
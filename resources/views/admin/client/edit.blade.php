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
            @can('add_client')
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

               {!! Form::open(['route'=>['admin.'.request()->segment(2).'.update',$client->id],'method'=>'put', 'files'=>true]) !!}

                 <div class="row">

                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                             {!! Form::label('first_name', 'First Name') !!}
                             {!! Form::text('first_name', $client->first_name, ['class' => 'form-control',  'placeholder'=>'First Name']) !!}
                             <small class="text-danger">{{ $errors->first('first_name') }}</small>
                        </div>
                    </div>



                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                           {!! Form::label('last_name', 'Last Name') !!}
                           {!! Form::text('last_name', $client->last_name, ['class' => 'form-control',  'placeholder'=>'Last Name']) !!}
                           <small class="text-danger">{{ $errors->first('last_name') }}</small>
                       </div>
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-group{{ $errors->has('gst') ? ' has-error' : '' }}">
                            {!! Form::label('gst', 'GST') !!}
                            {!! Form::text('gst', $client->gst, ['class' => 'form-control', 'placeholder' => 'GST']) !!}
                            <small class="text-danger">{{ $errors->first('gst') }}</small>
                        </div>
                     </div>

                     <div class="form-group col-md-6 col-sm-12">
                        <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                            {!! Form::label('company_name', 'Company Name') !!}
                            {!! Form::text('company_name', $client->company_name, ['class' => 'form-control', 'placeholder' => 'Company Name']) !!}
                            <small class="text-danger">{{ $errors->first('company_name') }}</small>
                        </div>
                     </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           {!! Form::label('email', 'Email') !!}
                           {!! Form::email('email', $client->email, ['class' => 'form-control',  'placeholder' => 'eg: foo@bar.com', 'autocomplete'=>'nope']) !!}
                           <small class="text-danger">{{ $errors->first('email') }}</small>
                       </div>
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                           {!! Form::label('mobile_no', 'Mobile Number') !!}
                           {!! Form::text('mobile_no', $client->mobile, ['class' => 'form-control', 'placeholder' => 'Mobile Number']) !!}
                           <small class="text-danger">{{ $errors->first('mobile_no') }}</small>
                       </div>
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            {!! Form::label('state', 'State') !!}
                            {!! Form::text('state', $client->state, ['class' => 'form-control', 'placeholder' => 'State']) !!}
                            <small class="text-danger">{{ $errors->first('state') }}</small>
                        </div>

                         <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            {!! Form::label('city', 'City') !!}
                            {!! Form::text('city', $client->city, ['class' => 'form-control', 'placeholder' => 'City']) !!}
                            <small class="text-danger">{{ $errors->first('city') }}</small>
                        </div>

                         <div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">
                            {!! Form::label('pincode', 'Pincode') !!}
                            {!! Form::text('pincode', $client->pincode, ['class' => 'form-control', 'placeholder' => 'Pincode']) !!}
                            <small class="text-danger">{{ $errors->first('pincode') }}</small>
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                       <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                           {!! Form::label('address', 'Address') !!}
                           {!! Form::textarea('address', $client->address, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                           <small class="text-danger">{{ $errors->first('address') }}</small>
                       </div>
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                          {!! Form::submit('Save Client Data', ['class' => 'btn btn-info pull-right']) !!}
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

@endpush
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


        {!! Form::open(['route'=>'admin.'.request()->segment(2).'.store', 'files'=>true]) !!}
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="form-group col-md-6 col-sm-12">
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                           {!! Form::label('first_name', 'First Name') !!}
                           {!! Form::text('first_name', null, ['class' => 'form-control',  'placeholder'=>'First Name']) !!}
                           <small class="text-danger">{{ $errors->first('first_name') }}</small>
                       </div>
                   </div>



                   <div class="form-group col-md-6 col-sm-12">
                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                     {!! Form::label('last_name', 'Last Name') !!}
                     {!! Form::text('last_name', null, ['class' => 'form-control',  'placeholder'=>'Last Name']) !!}
                     <small class="text-danger">{{ $errors->first('last_name') }}</small>
                 </div>
             </div>

             <div class="form-group col-md-6 col-sm-12">
                <div class="form-group{{ $errors->has('gst') ? ' has-error' : '' }}">
                    {!! Form::label('gst', 'GST') !!}
                    {!! Form::text('gst', null, ['class' => 'form-control', 'placeholder' => 'GST']) !!}
                    <small class="text-danger">{{ $errors->first('gst') }}</small>
                </div>
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                    {!! Form::label('company_name', 'Company Name') !!}
                    {!! Form::text('company_name', null, ['class' => 'form-control', 'placeholder' => 'Company Name']) !!}
                    <small class="text-danger">{{ $errors->first('company_name') }}</small>
                </div>
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                 {!! Form::label('email', 'Email') !!}
                 {!! Form::email('email', null, ['class' => 'form-control',  'placeholder' => 'eg: foo@bar.com', 'autocomplete'=>'nope']) !!}
                 <small class="text-danger">{{ $errors->first('email') }}</small>
             </div>
         </div>

         <div class="form-group col-md-6 col-sm-12">
            <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
             {!! Form::label('mobile_no', 'Mobile Number') !!}
             {!! Form::text('mobile_no', null, ['class' => 'form-control', 'placeholder' => 'Mobile Number']) !!}
             <small class="text-danger">{{ $errors->first('mobile_no') }}</small>
         </div>
     </div>

     <div class="form-group col-md-6 col-sm-12">
        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
            {!! Form::label('state', 'State') !!}
            {!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => 'State']) !!}
            <small class="text-danger">{{ $errors->first('state') }}</small>
        </div>

        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
            {!! Form::label('city', 'City') !!}
            {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'City']) !!}
            <small class="text-danger">{{ $errors->first('city') }}</small>
        </div>

        <div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">
            {!! Form::label('pincode', 'Pincode') !!}
            {!! Form::text('pincode', null, ['class' => 'form-control', 'placeholder' => 'Pincode']) !!}
            <small class="text-danger">{{ $errors->first('pincode') }}</small>
        </div>
    </div>

    <div class="form-group col-md-6 col-sm-12">
     <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
         {!! Form::label('address', 'Address') !!}
         {!! Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
         <small class="text-danger">{{ $errors->first('address') }}</small>
     </div>
 </div>




                   {{-- <div class="media-area" file-name="file" style="max-width:80%;float:left;">
                    <div class="media-file-value file-arrange"></div>
                    <div class="media-file file-arrange"></div>
                    <p><br></p>
                    <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Profile</a>
                </div> --}}

            </div>
        </div>
    </div>



    <div  class="report-repeater">
            
            <div data-repeater-list="group-a">
                <div data-repeater-list="group-a">
                    @foreach(old('group-a', [[]]) as $item)
                    <div class="repeater-row" data-repeater-item>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-md-3 col-sm-6">
                                        <div class="form-group{{$errors->has('group-a.'.$loop->index.'.plate_size') ? ' has-error' : '' }}">
                                            {!! Form::label('plate_size', 'Plate Size') !!}
                                            {!! Form::text('plate_size', old('group-a.'.$loop->index.'.plate_size', $item['plate_size'] ?? ''), ['class' => 'form-control', 'placeholder' => 'Enter Plate size']) !!}
                                            <small class="text-danger">{{ $errors->first('group-a.'.$loop->index.'.plate_size') }}</small>
                                        </div>
                                    </div>

                                     <div class="form-group col-md-3 col-sm-6">
                                        <div class="form-group{{$errors->has('group-a.'.$loop->index.'.job_type') ? ' has-error' : '' }}">
                                            {!! Form::label('job_type', 'Job Type') !!}
                                            {!! Form::select('job_type', App\Models\JobType::pluck('job_type','id'), null, ['id' => 'job_type', 'class' => 'form-control','placeholder'=>'Choose Job type']) !!}
                                            <small class="text-danger">{{ $errors->first('group-a.'.$loop->index.'.job_type') }}</small>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2 col-sm-6">
                                        <div class="form-group{{$errors->has('group-a.'.$loop->index.'.short_run_rate') ? ' has-error' : '' }}">
                                            {!! Form::label('short_run_rate', 'Short Run Rate') !!}
                                            {!! Form::text('short_run_rate', null, ['class' => 'form-control', 'placeholder' => 'Rate']) !!}
                                            <small class="text-danger">{{ $errors->first('group-a.'.$loop->index.'.short_run_rate') }}</small>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2 col-sm-6">
                                        <div class="form-group{{$errors->has('group-a.'.$loop->index.'.long_run_rate') ? ' has-error' : '' }}">
                                            {!! Form::label('long_run_rate', 'Long Run Rate') !!}
                                            {!! Form::text('long_run_rate', null, ['class' => 'form-control', 'placeholder' => 'Rate']) !!}
                                            <small class="text-danger">{{ $errors->first('group-a.'.$loop->index.'.long_run_rate') }}</small>
                                        </div>
                                    </div>

                            

                                    <div class="col-md-2 col-sm-6">
                                        <div class="form-group text-end">
                                            <button data-repeater-delete type="button" class="btn-label btn btn-danger" style="margin-top: 26px;"><i class="label-icon ri-delete-bin-fill"></i> Delete Row</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 text-start">
                    <div class="form-group">
                       {!! Form::submit('Save Client', ['class' => 'btn btn-info']) !!}
                   </div>
               </div>

               <div class="col-md-6 text-end">
                <div class="" style="width:100%;text-align:right;display: inline-block;">
                    <button data-repeater-create type="button" class="btn-label btn btn-success text-end" style="margin-bottom: 20px;"><i class="label-icon align-middle fs-16 me-2 bx bx-plus-circle"></i> Add New Row</button>
                </div>
               </div>
           </div>

        </div>


    {!! Form::close() !!} 
    
</div>
</div>



@endsection




@push('scripts')

<script type="text/javascript" src="{{asset('admin-assets/js/pages/form-repeater.js')}}"></script>
<script type="text/javascript">

    if($('.report-repeater').length){
        var  reportRepeater = $('.report-repeater').repeater({
           // initEmpty: true,
            defaultValues: {
                'textarea-input': 'foo',
                'text-input': 'bar',
            },
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this?')) {
                  $(this).slideUp(deleteElement);
              }
              setTimeout(function(){ update_amounts(); }, 500);
          },
          isFirstItemUndeletable: false
      });
    }
</script>
@endpush
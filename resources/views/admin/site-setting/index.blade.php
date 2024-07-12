@extends('admin.layouts.master')

@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/libs/dropify/css/dropify.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush


@section('main')
{!! Form::open(['method' => 'POST', 'route' => 'admin.site-setting.logo', 'class' => 'form-horizontal','files'=>true, 'id'=>'appsetting']) !!}
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>


            @can('logo_site_setting')
                <div class="page-title-right">
                    <div class="page-title-right">
                        {!! Form::submit("Update Setting", ['class' => 'btn-sm btn btn-primary rounded-pill']) !!}
                    </div>
                </div>
            @endcan
        </div>
    </div>
</div>


<div class="row my-1">
    <div class="col-lg-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-header bg-transparent border-primary">
                    <h5 class="my-0 text-primary">Site Details</h5>
                </div>

                <div class="card-body">



                   <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', $logo->title, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Title']) !!}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', $logo->description, ['class' => 'form-control', 'placeholder' => 'Description', 'rows'=>5]) !!}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>

                
                <div class="media-area" file-name="logo">
                    <div class="media-file-value">
                        @if($logo->siteLogo)
                            <input type="hidden" name="logo[]" value="{{$logo->logo}}" class="fileid{{$logo->logo}}">
                        @endif
                    </div>
                    <div class="media-file">
                        @if($logo->siteLogo)
                            <div class="file-container d-inline-block fileid{{$logo->logo}}">
                                <span data-id="{{$logo->logo}}" class="remove-file">✕</span>
                                <img class="w-100 d-block img-thumbnail" src="{{asset($logo->siteLogo->file)}}" alt="{{$logo->title}}">
                            </div>
                        @endif
                    </div>

                    <p><br></p>
                    <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Logo</a>
                </div>


                <div class="media-area" file-name="favicon">
                    <div class="media-file-value">
                        @if($logo->siteFavicon)
                            <input type="hidden" name="favicon[]" value="{{$logo->favicon}}" class="fileid{{$logo->favicon}}">
                        @endif
                    </div>
                    <div class="media-file">
                        @if($logo->siteFavicon)
                            <div class="file-container d-inline-block fileid{{$logo->favicon}}">
                                <span data-id="{{$logo->favicon}}" class="remove-file">✕</span>
                                <img class="w-100 d-block img-thumbnail" src="{{asset($logo->siteFavicon->file)}}" alt="{{$logo->title}}">
                            </div>
                        @endif
                    </div>
                    <p><br></p>
                    <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Favicon</a>
                </div> 

            </div>
        </div>
    </div>

</div>


<div class="col-lg-6 col-sm-12 col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-header bg-transparent border-primary">
                <h5 class="my-0 text-primary">Site Information</h5>
            </div>

            <div class="card-body">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', @$logo->email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>

                <div class="form-group{{ $errors->has('contact_no') ? ' has-error' : '' }}">
                    {!! Form::label('contact_no', 'Contact No.') !!}
                    {!! Form::text('contact_no', @$logo->contact_no, ['class' => 'form-control', 'placeholder' => 'Contact No.']) !!}
                    <small class="text-danger">{{ $errors->first('contact_no') }}</small>
                </div>

                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                    {!! Form::label('country', 'Country') !!}
                    {!! Form::text('country', @$logo->country, ['class' => 'form-control ', 'required' => 'required','placeholder'=>'Country']) !!}
                    <small class="text-danger">{{ $errors->first('country') }}</small>
                </div>

                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                    {!! Form::label('state', 'State') !!}
                    {!! Form::text('state', @$logo->state, ['class' => 'form-control', 'placeholder' => 'State', 'required'=>'required']) !!}
                    <small class="text-danger">{{ $errors->first('state') }}</small>
                </div>

                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                    {!! Form::label('city', 'City') !!}
                    {!! Form::text('city', @$logo->city, ['class' => 'form-control', 'required' => 'required','placeholder'=>'City']) !!}
                    <small class="text-danger">{{ $errors->first('city') }}</small>
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    {!! Form::label('address', 'Address') !!}
                    {!! Form::textarea('address', @$logo->address, ['class' => 'form-control', 'placeholder' => 'Address', 'rows'=>5]) !!}
                    <small class="text-danger">{{ $errors->first('address') }}</small>
                </div>
            </div>
        </div>

        <ul>

            {{-- @foreach(countries() as $country)
                <li>{{$country->emoji}} {{$country->name}} ({{$country->name}})</li>
            @endforeach --}}

        </ul>
@php
    // use PragmaRX\Countries\Package\Countries;
    // $countries = new Countries();
    // $all = $countries->where('name.common', 'India')->first()->hydrateCurrencies()->currencies;
@endphp


      
    </div>
</div>
</div>
{!! Form::close() !!}


@endsection


@push('scripts')

<script src="{{asset('admin-assets/libs/dropify/js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/libs/dropify/dropify.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script type="text/javascript">
    function appSettingUpdate(element){
        var button = new Button(element);
        button.process();
        clearErrors();
        var requestData,otpdata,data;
        formData = new FormData(document.querySelector('#appsetting'));

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url:'{{ route('admin.'.request()->segment(2).'.logo') }}',
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
                document.querySelector('#appsetting').reset();
            },
            error:function(error){
                Toastify({
                    text: response.message,
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: "error",

                }).showToast();
               // toastr.error(error.responseJSON.message); 
                button.normal();
                handleErrors(error.responseJSON);

            }
        });
    }

$(document).ready(function() {
    $('.select2').select2();
});
</script>

@endpush
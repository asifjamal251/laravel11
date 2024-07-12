@extends('admin.layouts.master')
@push('links')

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


{{-- {{dd($log)}} --}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    
                    <div class="card-body">
                        <table class="table align-middle" style="width:100%">
                            

                            <tr>
                                <th>User Email</th>
                                <td>
                                    {{@$log->causer->email}}
                                </td>
                            </tr>

                             <tr>
                                <th>Log Name</th>
                                <td>
                                    {{$log->log_name}}
                                </td>
                            </tr>

                             <tr>
                                <th>Description</th>
                                <td>
                                    {{$log->description}}
                                </td>
                            </tr>


                            <tr>
                                <th>Event</th>
                                <td>
                                    {{$log->event}}
                                </td>
                            </tr>


                            <tr>
                                <th>Created At</th>
                                <td>
                                    {{$log->created_at->format('d F, Y | H:i A')}}
                                </td>
                            </tr>
                       
                       
                        </table>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->

{{-- {{dd($log->properties)}} --}}
<div class="row">
     @if(@$log->properties['old'])
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header pt-2 pb-2">
                <h6 class="card-title mb-0">Old Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                   
                        <table class="table table-bordered">
                 
                            @foreach($log->properties['old'] as $key => $property)

                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$property}}</td>
                                </tr>
                            @endforeach
                        </table>
                    
                </div>

            </div>
        </div>
    </div>
@endif

 @if(@$log->properties['attributes'])
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header pt-2 pb-2">
                <h6 class="card-title mb-0">New Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                   
                        <table class="table table-bordered">
                 
                            @foreach($log->properties['attributes'] as $key => $property)

                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$property}}</td>
                                </tr>
                            @endforeach
                        </table>
                  
                </div>

            </div>
        </div>
    </div>
@endif

</div>

@endsection


@push('scripts')


@endpush
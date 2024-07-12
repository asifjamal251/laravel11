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




        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    
                    <div class="card-body">
                        <table class="table align-middle" style="width:100%">
                            
                            <tr>
                                <th width="15%">Avatar</th>
                                <td>
                                    <img class="avatar-img img-fluid d-block avatar-xl img-thumbnail rounded img-fluid d-block" src="{{asset($client->avatar)}}">
                                </td>
                            </tr>

                            <tr>
                                <th>Name</th>
                                <td>
                                    {{$client->first_name .' '. $client->last_name}}
                                </td>
                            </tr>


                            <tr>
                                <th>Email</th>
                                <td>
                                    {{$client->email}}
                                </td>
                            </tr>



                            <tr>
                                <th>Mobile No.</th>
                                <td>
                                    {{$client->mobile}}
                                </td>
                            </tr>


                            <tr>
                                <th>Address</th>
                                <td>
                                    {{$client->address}}
                                </td>
                            </tr>


                            <tr>
                                <th>Created At</th>
                                <td>
                                    {{$client->created_at->format('d F Y')}}
                                </td>
                            </tr>
                       
                       
                        </table>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->



@endsection


@push('scripts')


@endpush
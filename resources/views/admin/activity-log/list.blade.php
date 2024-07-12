@extends('admin.layouts.master')
@push('links')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush
@php
use Carbon\Carbon;
$todayDate = Carbon::now()->format('Y-m-d');
$startDate = $todayDate;
$endDate = $todayDate;
@endphp




@section('main')



        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>

                    <button class="btn btn-success btn-label btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="bx bx-slider-alt label-icon align-middle fs-16 me-2"></i>
                            </div>
                            <div class="flex-grow-1">
                                Filters
                            </div>
                        </div>
                    </button>


                    @can('add_activity_log')
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
                        <table id="datatable" class="datatable table table-bordered nowrap align-middle" style="width:100%">
                            <thead class="gridjs-thead">
                            <tr>
                                <th style="width:12px">Si</th>
                                <th>Log Name</th>
                                <th>Description</th>
                                <th>User</th>
                                <th>Created At</th>
                                @can(['read_activity_log'])
                                  <th>Action</th>
                                @endcan
                            </tr>
                        </thead>
                       
                        </table>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->



@endsection



@section('filter')
<form id="filterForm" action="" autocomplete="off">
<div class="offcanvas offcanvas-end border-0" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
    
    <div class="d-flex align-items-center bg-success bg-gradient p-3 offcanvas-header">
        <h5 class="m-0 me-2 text-white">Dasboard Filters</h5>

        <button type="button" class="btn-close btn-close-white ms-auto" id="customizerclose-btn" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>


    <div class="offcanvas-body bg-light">


        <div class="card">
            <div class="card-header pt-2 pb-2">
                <h6 class="card-title mb-0">Filter By Date</h6>
            </div>

            <div class="card-body">
                {!! Form::open(['method' => 'POST', 'route' => 'admin.dashboard.filter', 'class' => 'form-horizontal', 'id'=>'filterForm']) !!}
                    <div id="reportrange" class="form-icon w-100" style="width: 280px;text-align:center;cursor:pointer;">
                        <span><input id="datefilter" style="cursor:pointer;" type="text" class="form-control form-control-sm form-control-icon" name="datefilter" value="All" /></span> <i class="fa fa-calendar"></i>
                    </div>
                {!! Form::close() !!}
            </div>

        </div>




        <div class="card">
            <div class="card-header pt-2 pb-2">
                <h6 class="card-title mb-0">Filter By log Name</h6>
            </div>

            <div class="card-body">
                <div class="m-0 form-group{{ $errors->has('log_name') ? ' has-error' : '' }}">
                    {!! Form::select('log_name', Spatie\Activitylog\Models\Activity::pluck('log_name', 'log_name'), null, ['id' => 'log_name', 'class' => 'form-control form-control-sm', 'placeholder' => 'Select Log Name']) !!}
                    <small class="text-danger">{{ $errors->first('log_name') }}</small>
                </div>
            </div>

        </div>



        <div class="card">
            <div class="card-header pt-2 pb-2">
                <h6 class="card-title mb-0">Filter By Event</h6>
            </div>

            <div class="card-body">
                <div class="m-0 form-group{{ $errors->has('event') ? ' has-error' : '' }}">
                    {!! Form::select('event', Spatie\Activitylog\Models\Activity::pluck('event', 'event'), null, ['id' => 'event', 'class' => 'form-control form-control-sm', 'placeholder' => 'Select Event']) !!}
                    <small class="text-danger">{{ $errors->first('event') }}</small>
                </div>
            </div>

        </div>



    </div>

    <div class="offcanvas-footer border-top p-3 text-center">
        <div class="row">
            <div class="col-6">
                <button type="button" class="btn btn-soft-warning w-100 resetFilter border-warning">Reset</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-soft-success w-100 filters border-success">Apply Filter</button>
            </div>
        </div>
    </div>


</div>
</form>
@endsection


@push('scripts')

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script type="text/javascript">

    $(function() {
        
        var start = moment();
        var end = moment();
        
        function cb(start, end) {
            $('#reportrange span input').val(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
        }
        
        $('#reportrange').daterangepicker({
            startDate: null,
            endDate: null,
            ranges: {
             'All': ['null', 'null'],
             'Today': [moment(), moment()],
             'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
             'Last 7 Days': [moment().subtract(6, 'days'), moment()],
             'Last 30 Days': [moment().subtract(29, 'days'), moment()],
             'This Month': [moment().startOf('month'), moment().endOf('month')],
             'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
         }
     }, cb);

        $('#reportrange').on('hide.daterangepicker', function(ev, picker) {
            var inputDate  = $('#datefilter').val();
            console.log('Date', inputDate );
            if(inputDate != 'Invalid date - Invalid date'){
               // alert('ok')
            }
            else{
                $('#datefilter').val('All')
            }
        });
        
       // cb(start, end);
        
    });


$(document).ready(function(){
    var table2 = $('#datatable').DataTable({
     "processing": true,
     "serverSide": true,
    'ajax': {
    'url': '{{ route('admin.'.request()->segment(2).'.index') }}',
    'data': function(d) {
        d._token = '{{ csrf_token() }}';
        d._method = 'PATCH';
        d.datefilter = $('#datefilter').val();
        d.log_name = $('#log_name').val();
        d.event = $('#event').val();
    }

    },
    "columns": [
        { "data": "sn" },
        { "data": "log_name" },
        { "data": "description" },
        { "data": "user"},
        { "data": "created_at"},
        @can(['read_activity_log'])
        {
            "data": "action",
            render: function(data, type, row) {
                if (type === 'display') {
                    var btn = '<div class="dropdown d-inline-block"><button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill align-middle"></i></button><ul class="dropdown-menu dropdown-menu-end">';

                   

                    @can('read_activity_log')
                    btn += '<li><a class="dropdown-item" href="{{ request()->url() }}/' + row['id'] + '"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>';
                    @endcan


           

                   
                     btn += '</ul></div>';
                    return btn;
                }
                return ' ';
            },
    }
     @endcan
       
     ]

});



    $('body').on('click', '.filters', function(){
        table2.draw('page');
        $('#offcanvasTop').offcanvas('hide')
    });


    $('body').on('click', '.resetFilter', function(){
        $('#filterForm').trigger("reset");
        table2.draw('page');
        $('#offcanvasTop').offcanvas('hide');
    });



});
    </script>

@endpush
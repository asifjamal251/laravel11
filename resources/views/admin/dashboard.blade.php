@extends('admin.layouts.master')
@push('links')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endpush




@section('main')
@php
use Carbon\Carbon;
$todayDate = Carbon::now()->format('Y-m-d');
$startDate = $todayDate;
$endDate = $todayDate;
@endphp


<!-- start page title -->
<div class="row">
    <div class="col-12">

        <div class="offcanvas-body p-0">
        </div>
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Dashboard</h4>
            
            {{-- <button class="btn btn-primary btn-label" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i class="bx bx-slider-alt fs-18"></i></button> --}}

            


            <div class="page-title-right">
                <button class="btn btn-primary btn-label btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <i class="bx bx-slider-alt label-icon align-middle fs-16 me-2"></i>
                        </div>
                        <div class="flex-grow-1">
                            Filters
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end page title -->





@endsection




@section('filter')
<!-- top offcanvas -->
<div class="offcanvas offcanvas-end border-0" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
    
    <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
        <h5 class="m-0 me-2 text-white">Dasboard Filters</h5>

        <button type="button" class="btn-close btn-close-white ms-auto" id="customizerclose-btn" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>


    <div class="offcanvas-body bg-light">

        <div class="card">
            <div class="card-header pt-2 pb-2">
                <h6 class="card-title mb-0">Date</h6>
            </div>

            <div class="card-body">
                {!! Form::open(['method' => 'POST', 'route' => 'admin.dashboard.filter', 'class' => 'form-horizontal', 'id'=>'filterForm']) !!}
                    <div id="reportrange" class="form-icon w-100" style="width: 280px;text-align:center;cursor:pointer;">
                        <span><input style="cursor:pointer;" type="text" class="form-control form-control-sm form-control-icon" name="datefilter" value="{{Carbon::parse($startDate)->format('d F Y')}} - {{Carbon::parse($endDate)->format('d F Y')}}" /></span> <i class="fa fa-calendar"></i>
                    </div>
                {!! Form::close() !!}
            </div>

        </div>


    </div>

    <div class="offcanvas-footer border-top p-3 text-center">
        <div class="row">
            <div class="col-6">
                <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
            </div>
            <div class="col-6">
                <a href="https://1.envato.market/velzon-admin" target="_blank" class="btn btn-primary w-100">Buy Now</a>
            </div>
        </div>
    </div>


</div>
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
            startDate: start,
            endDate: end,
            ranges: {
             'Today': [moment(), moment()],
             'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
             'Last 7 Days': [moment().subtract(6, 'days'), moment()],
             'Last 30 Days': [moment().subtract(29, 'days'), moment()],
             'This Month': [moment().startOf('month'), moment().endOf('month')],
             'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
         }
     }, cb);
        
       // cb(start, end);
        
    });

    
</script>
@endpush
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
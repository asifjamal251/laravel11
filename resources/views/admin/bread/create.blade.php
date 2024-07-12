@extends('admin.layouts.master')
@push('links')

@endpush




@section('main')


        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>

                    <div class="page-title-right">
                        <a href="{{ route('admin.'.request()->segment(2).'.create') }}"  class="btn-sm btn btn-primary btn-label rounded-pill">
                            <i class="bx bx-plus label-icon align-middle rounded-pill fs-16 me-2"></i>
                            Add {{Str::title(str_replace('-', ' ', request()->segment(2)))}}
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-3 col-sm-12"></div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                       {!! Form::open(['route'=>'admin.bread.store']) !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-soft-secondary waves-effect waves-light">Create</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div><!--end col-->
            <div class="col-md-3 col-sm-12"></div>
        </div><!--end row-->



@endsection


@push('scripts')

@endpush
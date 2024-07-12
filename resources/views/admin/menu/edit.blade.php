@extends('admin.layouts.master')
@push('links')
@endpush
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Create Menu</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            @can('add_menu')
                <a href="{{ route('admin.menu.create') }}" class="btn btn-primary btn-sm">Add Menu</a>
            @endcan
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
           {!! Form::open(['route'=>['admin.menu.update', $menu->slug], 'method'=>'put','id'=>'menuForm']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Menu Name', ['class'=>'control-label']) !!}
                {!! Form::text('name', $menu->name, ['class'=>'form-control']) !!}
                <b class="text-danger">{{$errors->first('name')}}</b>
                </div>


                <div class="form-group">
                    {!! Form::label('icon', 'Icon', ['class'=>'control-label']) !!}
                    {!! Form::text('icon', $menu->icon, ['class'=>'form-control']) !!}
                    <b class="text-danger">{{$errors->first('icon')}}</b>
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'Status', ['class'=>'control-label']) !!}
                {!! Form::select('status', array(1 => 'Active', '0' => 'Deactive'), $menu->status, array('class' => 'form-control')); !!}
                <b class="text-danger">{{$errors->first('status')}}</b>
                </div>                       
                <div class="form-group">
                    <input type="hidden" name="slug" value="{{ $menu->slug }}" />
                    <button type="submit" onclick="submitForm()" style=" margin-right: 14px;padding: 7px;width: 71px;background: #dcd7d7;" class="btn btn-success">Update</button>
                    
                </div>
            {!! Form::close() !!}

        </div>
             
    </div>
</div>
@endsection
@push('scripts')


@endpush
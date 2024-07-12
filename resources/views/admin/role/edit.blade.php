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
                        <a href="{{ route('admin.'.request()->segment(2).'.create') }}" class="btn-sm btn btn-primary btn-label rounded-pill">
                            <i class="bx bx-plus label-icon align-middle rounded-pill fs-16 me-2"></i>
                            Add {{Str::title(str_replace('-', ' ', request()->segment(2)))}}
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        {!! Form::open(['route'=>['admin.'.request()->segment(2).'.update',$role->id],'method'=>'put']) !!}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">


                            <input type="hidden" name="_method" value="PUT">
                            <!-- <legend>Edit your Detail </legend> -->
                            <div class="row">
                                <div class="form-group col-md-2 col-sm-12"></div>
                                <div class="form-group col-md-6">
                                    <input type="text" value="{{ $role->name }}" name="name" class="form-control" id="" placeholder="Input field">
                                </div>
                                <div class="form-group col-md-2 col-sm-6 col-xs-12 text-right" >
                                    <button type="button" class="permission-select-all btn btn-success btn-icon waves-effect waves-light">
                                        <i class="ri-check-double-line"></i>
                                    </button>

                                    <button type="button" class="permission-deselect-all btn btn-danger btn-icon waves-effect waves-light">
                                        <i class="ri-delete-bin-5-line"></i>
                                    </button>
                                </div>
                                <div class="form-group col-md-2 col-sm-12"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row"> 

            @foreach($permissions as $table => $groupPermission)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="permissions list-group list-group-flush">
                                <li class="list-group-item">
                                    <input type="checkbox" id="" class="permission-group">
                                    <label class="m-0" for="{{$table}}"><strong>{{ Str::title(str_replace('_',' ', $table)) }} </strong></label>
                                    <ul class="list-group list-group-flush">
                                        @foreach($groupPermission as $permission)
                                        <li class="list-group-item">
                                            <input type="checkbox" id="permission-{{ $permission->permission_key }} " name="permissions[]" class="the-permission" {{ $permission->checked? 'checked' :'' }} value="{{ $permission->permission_key }}" >
                                            <label class="m-0" for="permission-{{ $permission->permission_key }}">{{ Str::title(str_replace('_',' ', $permission->permission_key)) }}</label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-md-12 text-right">
    <br>
    <div class="form-group" style="position: fixed;bottom: 50px;right: 25px;">
        <button type="submit" class="btn btn-primary">Save Permissions</button>
    </div>
</div>
        </div>





        {!! Form::close() !!}



@endsection









@push('scripts')
<script src="{{asset('admin-assets/js/jquery.matchHeight.js')}}"></script>
<script>

    $('document').ready(function () {

        $('.permissions').matchHeight({ property: 'min-height' });


        $('.permission-group').on('change', function(){
            $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
        });
        $('.permission-select-all').on('click', function(){
            $('ul.permissions').find("input[type='checkbox']").prop('checked', true);
            return false;
        });
        $('.permission-deselect-all').on('click', function(){
            $('ul.permissions').find("input[type='checkbox']").prop('checked', false);
            return false;
        });
        function parentChecked(){
            $('.permission-group').each(function(){
                var allChecked = true;
                $(this).siblings('ul').find("input[type='checkbox']").each(function(){
                    if(!this.checked) allChecked = false;
                });
                $(this).prop('checked', allChecked);
            });
        }
        parentChecked();
        $('.the-permission').on('change', function(){
            parentChecked();
        });
    });
</script>
@endpush
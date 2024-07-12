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
                @can('add_admin')
                <div class="page-title-right">
                    <a href="{{ route('admin.'.request()->segment(2).'.create') }}" class="btn-sm btn btn-primary btn-label rounded-pill">
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
            

            {{ html()->form('PUT', route('admin.'.request()->segment(2).'.update', $admin->id))->attribute('files', true)->open() }}

            <div class="row">

                <div class="mb-3 form-group col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{ html()->label('Name')->for('name') }}
                                {{ html()->text('name', $admin->name)->class('form-control')->placeholder('Name') }}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>

                            @can('change_email')
                            <div class="mb-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{ html()->label('Email')->for('email') }}
                                {{ html()->email('email', $admin->email)->class('form-control')->placeholder('eg: foo@bar.com')->attribute('autocomplete', 'nope') }}
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>
                            @endcan

                            @can('change_email')
                            <div class="mb-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {{ html()->label('Password')->for('password') }}
                                {{ html()->password('password')->class('form-control')->placeholder('Password')->attribute('autocomplete', 'new-password') }}
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </div>
                            @endcan

                            <div class="mb-3 form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
                                {{ html()->label('Contact Number')->for('contact_number') }}
                                {{ html()->text('contact_number', $admin->mobile)->class('form-control')->placeholder('Contact Number') }}
                                <small class="text-danger">{{ $errors->first('contact_number') }}</small>
                            </div>

                            <div class="mb-3 form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                {{ html()->label('Gender')->for('gender') }}
                                {{ html()->select('gender', ['male' => 'Male', 'female' => 'Female'], $admin->gender)->class('form-control')->placeholder('Gender') }}
                                <small class="text-danger">{{ $errors->first('gender') }}</small>
                            </div>

                            
                        </div>
                    </div>
                </div>

                <div class="mb-3 form-group col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                {{ html()->label('Status')->for('status') }}
                                {{ html()->select('status', [1 => 'Active', 0 => 'Inactive'], $admin->status)->class('form-control')->id('admin_status')->placeholder('User Status') }}
                                <small class="text-danger">{{ $errors->first('status') }}</small>
                            </div>

                            <div class="mb-3 form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                {{ html()->label('Date Of Birth')->for('date_of_birth') }}
                                <div class="input-group">
                                    {{ html()->text('date_of_birth', $admin->date_of_birth)->class('form-control')->attribute('data-date-format', 'd M, Y')->placeholder('Date Of Birth')->attribute('data-provider', 'flatpickr') }}
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                                <small class="text-danger">{{ $errors->first('date_of_birth') }}</small>
                            </div>

                            <div class="mb-3 form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                {{ html()->label('Role')->for('role') }}
                                {{ html()->select('role', App\Models\Role::whereNotIn('id', [1])->pluck('name', 'id'), $admin->role_id)->class('form-control')->placeholder('Select Role') }}
                                <small class="text-danger">{{ $errors->first('role') }}</small>
                            </div>

                            <div class="mb-3 form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                {{ html()->label('Avatar')->for('avatar') }}
                                {{ html()->file('avatar')->class('dropify')->attribute('data-default-file', asset($admin->avatar)) }}
                                <small class="text-danger">{{ $errors->first('avatar') }}</small>
                            </div> 
                        </div>
                    </div>
                    <div class="mb-3 form-group" style="margin-top: 40px; margin-bottom: 0;">
                        {{ html()->submit('Update User')->class('btn btn-soft-secondary waves-effect waves-light') }}
                    </div>
                </div>
            </div>

            {{ html()->form()->close() }}
        </div>
    </div>
</div>
</div>

@endsection

@push('scripts')
<script src="{{asset('admin-assets/libs/dropify/js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/libs/dropify/dropify.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endpush

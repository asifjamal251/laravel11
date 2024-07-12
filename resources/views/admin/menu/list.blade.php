@extends('admin.layouts.master')
@push('links')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/libs/nestable/jquery.nestable.css') }}" />
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
            <div class="col-lg-12">
                <div class="card">
                    
                    <div class="card-body">
                      

                      <div class="dd" id="nestable_list_2">
            <ol class="dd-list">
                @foreach($menus as $menu)
                <li class="dd-item dd3-item" data-id="{{ $menu->slug }}">
                    <div class="dd-handle dd3-handle"></div>
                    <div class="dd3-content">{{ $menu->name }}
                        @can('edit_menu')
                        <a href="{{ route('admin.menu.edit',$menu->slug)}}" class="btn btn-link pull-right" style="padding: 0px 6px; margin-top: -2px;">Edit</a>
                        @endcan
                        @can('delete_menu')
                        @if($menu->childs->isEmpty())
                        <span style="margin:0px 10px 0px 10px" class="pull-right">/</span>
                        <button onclick="deleteAjax('{{ route('admin.menu.destroy',$menu->slug)}}',function(){window.location.reload(); })" class="btn btn btn-link pull-right" style="padding: 0px 6px; margin-top: -2px;">Delete</button>
                        @endcan
                        @endif
                    </div>
                    @if($menu->childs->count())
                    <ol class="dd-list" id="{{ $menu->slug }}">
                        @foreach($menu->childs as $child)
                        <li class="dd-item dd3-item" data-id="{{ $child->slug }}">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">{{ $child->name }}
                                @can('edit_menu')
                                <a href="{{ route('admin.menu.edit',$child->slug)}}" class="btn btn-link pull-right" style="padding: 0px 6px; margin-top: -2px;">Edit</a>
                                @endcan
                                @can('delete_menu')
                                <span style="margin:0px 10px 0px 10px" class="pull-right">/</span>
                                <button onclick="deleteAjax('{{ route('admin.menu.destroy',$child->slug)}}',function(){window.location.reload(); })" class="btn btn-link pull-right" style="padding: 0px 6px; margin-top: -2px;">Delete</button>
                                @endcan
                            </div>
                        </li>
                        @endforeach
                    </ol>
                    @endif
                </li>
                @endforeach
            </ol>
        </div>

                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        



@endsection




@push('scripts')
<script src="{{asset('admin-assets/libs/nestable/jquery.nestable.js')}}"></script>

<script>
var updateOutput = function(e) {
    var list = e.length ? e : $(e.target),
        output = list.data('output');
    output.val(JSON.stringify(list.nestable('serialize')));
};
$('#nestable_list_2').nestable({
    group: 1,
    maxDepth: 2
}).on('change', function(e) {
    var list = e.length ? e : $(e.target),
        output = list.data('output');
    var data = list.nestable('serialize');
    @can('edit_menu')
    $.ajax({
        url: '{{ route('admin.menu.update','') }}/1',
        data: {
            'data': list.nestable('serialize'),
            '_method': 'put',
            '_token': '{{ csrf_token() }}',
            '_list': 'nestable'
        },
        method: 'post',
        success: function(response) {

            Toastify({
                text: response.message,
                duration: 800,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                className: "success",

            }).showToast();

           // toastr.success(response.message);
            setTimeout(function() {
                window.location.reload();
            }, 800);
        },
        error: function(response) {
            Toastify({
                text: response.message,
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                className: "error",

            }).showToast();
            //toastr.error(response.message);
        }
    });
    @endcan
});
</script>


@endpush
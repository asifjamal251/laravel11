<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="enable">

<head>

    <meta charset="utf-8" />
    <title>{{get_app_setting('title')}} | {{Str::title(str_replace('-', ' ', request()->segment(2)))}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Themesbrand" name="author" />
    {{-- <link rel="manifest" href="/manifest.json"> --}}

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset(get_app_setting('favicon')??'admin-assets/images/favicon.ico')}}">
    @stack('links')
    <!-- Layout config Js -->
    <script src="{{asset('admin-assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('admin-assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('admin-assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
   
    <link href="{{asset('admin-assets/libs/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-assets/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    
     <link href="{{asset('admin-assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('admin-assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('admin-assets/libs/glightbox/css/glightbox.min.css')}}">
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

       @include('admin.layouts.header')
        <!-- ========== App Menu ========== -->
        @include('admin.layouts.aside')
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @section('main')
                              @show 
                    <!-- End Page-content -->
                </div>
            </div>

            @include('admin.layouts.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @yield('filter')

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    @include('admin.media.media-files')

    <!-- Theme Settings -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JAVASCRIPT -->
    <script src="{{asset('admin-assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin-assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('admin-assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('admin-assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{asset('admin-assets/libs/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('admin-assets/libs/dropzone/dropzone-min.js')}}"></script>
    <script src="{{asset('admin-assets/js/custom.js')}}"></script>
    <script src="{{asset('admin-assets/js/media.js')}}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script src="{{asset('admin-assets/libs/glightbox/js/glightbox.min.js')}}"></script>
    @if (Session::has('message'))
        <script type="text/javascript">
            Toastify({
                text: "{{Session::get('message')}}",
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                className: "{{Session::get('class')}}",

            }).showToast();
        </script>
    @endif
    <!-- App js -->
    
    <script type="text/javascript">
         const lightbox = GLightbox({
            touchNavigation: true,
            loop: true,
            autoplayVideos: true
        });
    </script>
     @stack('scripts')

     
     <script src="{{asset('admin-assets/js/app.js')}}"></script>
     <script type="text/javascript">

       



var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
    function deleteAjax(url,callback=null){  

    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#dc3545",
        confirmButtonText: "Yes, Delete it !",
        cancelButtonText: "No, Cancel it !",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function (isConfirm) {
        if (isConfirm) {
        $.ajax({
            url:url,
            method: 'post',
            data:{'_method':'DELETE','_token':'{{ csrf_token() }}'},
            dataType:'json',
            success:function(response){
                if(response.class){
                    swal({
                        title: "Deleted!",
                        text: "Your imaginary file has been deleted.",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });
                   // Command: toastr[response.class](response.message);
                    $('.datatable').DataTable().draw('page');
                    $('.dataTableAjax').DataTable().draw('page');

                }
                if(document.getElementsByClassName('dataTableAjax')){
                    $('.dataTableAjax').DataTable().draw();
                }
                if(document.getElementsByClassName('datatable')){
                    // setTimeout(function(){
                    //     window.location.reload();
                    // }, 300)
                    $('.datatable').DataTable().draw('page');
                    
                }
                if(callback)
                    callback(callback);
            }
        });

            
        }
    });
    return false;
}



function updateData(url,data={},callback=null){  
    if (confirm('Are you sure to perform this action')){                      
        $.ajax({
            url:url,
            method: 'post',
            data:Object.assign({'_method':'PUT','_token':'{{ csrf_token() }}'},data),
            dataType:'json',

            success:function(response){
                if(response.class){
                    Toastify({
                        text: response.message,
                        duration: 3000,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        className: response.class,
                    }).showToast();
                }

                if(typeof callback == 'function'){
                    callback(response);
                }

                if(document.getElementsByClassName('datatable').length){
                    $('.datatable').DataTable().draw('page');
                }
                else{
                    setTimeout(function(){
                        window.location.reload();
                    }, 300)
                }
            }
        });

    } 
    return false;
}

function cancelData(url,data={},callback=null){  
    if (confirm('Are you sure to perform this action')){                      
        $.ajax({
            url:url,
            method: 'post',
            data:Object.assign({'_method':'PUT','_token':'{{ csrf_token() }}'},data),
            dataType:'json',

            success:function(response){
                if(response.class){
                    Toastify({
                        text: response.message,
                        duration: 3000,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        className: response.class,
                    }).showToast();
                }

                if(typeof callback == 'function'){
                    callback(response);
                }

                if(document.getElementsByClassName('datatable').length){
                    $('.datatable').DataTable().draw('page');
                }
                else{
                    setTimeout(function(){
                        window.location.reload();
                    }, 300)
                }
            }
        });

    } 
    return false;
}
</script>

<script type="text/javascript">
    var previewTemplate, dropzone, dropzonePreviewNode = document.querySelector("#dropzone-preview-list");
    dropzonePreviewNode.id = "", dropzonePreviewNode && (previewTemplate = dropzonePreviewNode.parentNode.innerHTML,
        dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode), dropzone = new Dropzone(".dropzone", {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.media.store') }}",
            method: "post",
            previewTemplate: previewTemplate,
            previewsContainer: "#dropzone-preview",
            addRemoveLinks: false,
            success: function(file, response) {
                $('#mediafiles-list').html('');
                setTimeout(function() {
                    mediafiles(1);
                    Toastify({
                        text: response.message,
                        duration: 3000,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        className: response.class,

                    }).showToast();
                }, 1500);
            },
            error: function(file, response) {
                return false;
            }
        }));
</script>
</body>
</html>
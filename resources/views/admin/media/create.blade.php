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
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Dropzone</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <p class="text-muted">DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews.</p>

                                    <div class="dropzone">
                                        <div class="fallback">
            
               <input name="file" type="file" multiple="multiple">
                                            
                                        </div>
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                            </div>

                                            <h4>Drop files here or click to upload.</h4>
                                        </div>
                                    </div>

                                    <ul class="list-unstyled mb-0" id="dropzone-preview">
                                        <li class="mt-2" id="dropzone-preview-list">
                                            <!-- This is used as the file preview template -->
                                            <div class="border rounded">
                                                <div class="d-flex p-2">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm bg-light rounded">
                                                            <img data-dz-thumbnail class="img-fluid rounded d-block" src="#" alt="Dropzone-Image" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="pt-1">
                                                            <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                            <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                            <strong class="error text-danger" data-dz-errormessage></strong>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="flex-shrink-0 ms-3">
                                                        <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- end dropzon-preview -->
                                </div>
                                <!-- end card body -->
                            </div>

</div>
</div><!--end col-->
<div class="col-md-3 col-sm-12"></div>
</div><!--end row-->



@endsection


@push('scripts')

<script type="text/javascript">
Dropzone.autoDiscover = false;
    var previewTemplate, dropzone, dropzonePreviewNode = document.querySelector("#dropzone-preview-list");
    dropzonePreviewNode.id = "", dropzonePreviewNode && (previewTemplate = dropzonePreviewNode.parentNode.innerHTML, dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode), dropzone = new Dropzone(".dropzone", {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('admin.'.request()->segment(2).'.store')}}",
        method: "post",
        previewTemplate: previewTemplate,
        previewsContainer: "#dropzone-preview",
        addRemoveLinks: false,
        success: function(file, response) 
        {
            Toastify({
                text: response.message,
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                className: response.class,

            }).showToast();
        
        },
        error: function(file, response)
        {
           return false;
        }
        // removedfile: function(file) 
        // {
        //     var name = file.upload.filename;
        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        //         },
        //         type: 'POST',
        //         url: '{{route('admin.'.request()->segment(2).'.store')}}',
        //         data: {filename: name},
        //         success: function (data){
        //             console.log("File has been successfully removed!!");
        //         },
        //         error: function(e) {
        //             console.log(e);
        //         }});
        //     var fileRef;
        //     return (fileRef = file.previewElement) != null ? 
        //     fileRef.parentNode.removeChild(file.previewElement) : void 0;
        // }
    }));
</script>

{{-- <script type="text/javascript">
    Dropzone.options.dropzone =
    {
        maxFilesize: 12,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file) 
        {
            var name = file.upload.filename;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '{{ url("image/delete") }}',
                data: {filename: name},
                success: function (data){
                    console.log("File has been successfully removed!!");
                },
                error: function(e) {
                    console.log(e);
                }});
            var fileRef;
            return (fileRef = file.previewElement) != null ? 
            fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },

        success: function(file, response) 
        {
            console.log(response);
        },
        error: function(file, response)
        {
           return false;
       }
   };
</script> --}}
@endpush
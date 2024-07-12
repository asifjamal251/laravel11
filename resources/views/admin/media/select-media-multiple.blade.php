 <div class="offcanvas mediaselectionlist offcanvas-end" tabindex="-1" id="multiplemedia" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Select Multiple File</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body p-0 overflow-hidden">
        <div data-simplebar class="p-2" style="height: calc(100vh - 116px);padding-bottom: 12px;">





            <div class="dropzone mb-3">
                <div class="fallback">

                    <input name="file" type="file" multiple="multiple">

                </div>
                <div class="dz-message needsclick">
                    <div class="mb-3">
                        <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                    </div>

                </div>
            </div>

            <ul class="d-none list-unstyled mb-0" id="dropzone-preview">
                <li class="mt-2" id="dropzone-preview-list">
                    <!-- This is used as the file preview template -->
                    <div class="border rounded">
                        <div class="d-flex p-2">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm bg-light rounded">
                                    <img data-dz-thumbnail class="img-fluid rounded d-block" src="#"
                                        alt="Dropzone-Image" />
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


            <ul id="medias-list-multiple" class="m-0 p-0 d-flex justify-content-between w-100 flex-wrap"
                style="list-style: none;">

            </ul>

            <p class="m-0 text-center pt-3 pb-3 loadmore-btn" id="load-more-single" data-paginate="2">Load more...</p>
            <p class="no-more m-0 text-center pt-3 pb-3">No more media</p>

        </div>
    </div>

  
    <div class="offcanvas-foorter border p-3 text-center">
        <button onclick="selectMultipleFiles()" class="btn">Select File</button>
    </div>
</div>  
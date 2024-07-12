 @can('browse_cutting')
                        <div class="col-xl-3 col-md-6">
                            <a href="{{route('admin.cutting.index')}}">
                            <div class="card bg-success card-animate card-height-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-light text-white rounded-2 fs-2">
                                                <i class="bx bx-cut"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-white-50 mb-3">Total Sheet</p>
                                            <h4 class="fs-4 mb-3 text-white"><span class="counter-value" data-target="{{$cutting_total}}"></span></h4>
                                            
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <span class="badge badge-soft-light fs-12">Cutting<span></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endcan


                        @can('browse_heidelberg_1')
                        <div class="col-xl-3 col-md-6">
                            <a href="{{route('admin.heidelberg-1.index')}}">
                            <div class="card card-animate card-height-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                                <i class="bx bx-cube"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-muted mb-3">Total Sheet</p>
                                            <h4 class="fs-4 mb-3"><span class="counter-value" data-target="{{$first_heidelberg_total}}">0</span></h4>
                                           
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <span class="badge badge-soft-warning fs-12">Heidelberg 1<span></span></span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                            </a>
                        </div>
                        @endcan


                        @can('browse_heidelberg_2')
                        <div class="col-xl-3 col-md-6">
                            <a href="{{route('admin.heidelberg-2.index')}}">
                            <div class="card bg-dark card-animate card-height-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-light text-white rounded-2 fs-2">
                                                <i class="bx bx-cube-alt"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-white-50 mb-3">Total Sheet</p>
                                            <h4 class="fs-4 mb-3 text-white"><span class="counter-value" data-target="{{$second_heidelberg_total}}">0</span></h4>
                                            
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <span class="badge badge-soft-light fs-12">Heidelberg 2<span></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endcan


                        @can('browse_dominant')
                        <div class="col-xl-3 col-md-6">
                            <a href="{{route('admin.dominant.index')}}">
                            <div class="card bg-primary card-animate card-height-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-light text-white rounded-2 fs-2">
                                                <i class="bx bx-paint"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-white-50 mb-3">Total Sheet</p>
                                            <h4 class="fs-4 mb-3 text-white"><span class="counter-value" data-target="{{$dominant_total}}">0</span></h4>
                                            
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <span class="badge badge-soft-light fs-12">Dominant<span></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endcan


                        @can('browse_lamination')
                        <div class="col-xl-3 col-md-6">
                            <a href="{{route('admin.lamination.index')}}">
                            <div class="card bg-secondary card-animate card-height-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-light text-white rounded-2 fs-2">
                                                <i class="ri-stack-line"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-white-50 mb-3">Total Sheet</p>
                                            <h4 class="fs-4 mb-3 text-white"><span class="counter-value" data-target="{{$lamination_total}}">0</span></h4>
                                            
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <span class="badge badge-soft-light fs-12">Lamination<span></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endcan



                        @can('browse_embossing')
                        <div class="col-xl-3 col-md-6">
                            <a href="{{route('admin.embossing.index')}}">
                            <div class="card bg-warning card-animate card-height-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-light text-white rounded-2 fs-2">
                                                <i class="bx bx-outline"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-white-50 mb-3">Total Sheet</p>
                                            <h4 class="fs-4 mb-3 text-white"><span class="counter-value" data-target="{{$embossing_total}}">20</span></h4>
                                            
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <span class="badge badge-soft-light fs-12">Embossing<span></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endcan


                        @can('browse_leafing')
                        <div class="col-xl-3 col-md-6">
                            <a href="{{route('admin.leafing.index')}}">
                            <div class="card bg-info card-animate card-height-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-light text-white rounded-2 fs-2">
                                                <i class="fa fa-leaf"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-white-50 mb-3">Total Sheet</p>
                                        <h4 class="fs-4 mb-3 text-white"><span class="counter-value" data-target="{{$leafing_total}}">0</span></h4>
                                            
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <span class="badge badge-soft-light fs-12">Leafing<span></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endcan


                        @can('browse_die_cutting')
                        <div class="col-xl-3 col-md-6">
                            <a href="{{route('admin.die-cutting.index')}}">
                            <div class="card bg-danger card-animate card-height-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-light text-white rounded-2 fs-2">
                                                <i class="fa fa-crosshairs"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <p class="text-uppercase fw-medium text-white-50 mb-3">Total Sheet</p>
                                            <h4 class="fs-4 mb-3 text-white"><span class="counter-value" data-target="{{$die_cutting_total}}">0</span></h4>
                                            
                                        </div>
                                        <div class="flex-shrink-0 align-self-center">
                                            <span class="badge badge-soft-light fs-12">Die Cutting<span></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endcan
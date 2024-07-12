<div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="{{ route('admin.dashboard.index') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset(get_app_setting('favicon')??'assets/images/logo-sm.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset(get_app_setting('logo')??'assets/images/logo-dark.png')}}" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="{{ route('admin.dashboard.index') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset(get_app_setting('favicon')??'assets/images/logo-sm.png')}}" alt="" width="40">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset(get_app_setting('logo')??'assets/images/logo-light.png')}}" alt="" width="140">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            @php
                $menus = \App\Models\Menu::select('name','slug','icon')
                ->where(function($query){
                    $query->whereNull('parent');
                    $query->whereStatus(1);
                    $query->whereHas('rolePermissions',function($query){
                        $query->where('role_permissions.role_id','=',auth('admin')->user()->role_id);
                        $query->whereRaw("role_permissions.permission_key = concat('browse_',menus.slug)");
                    });
                })
                ->orWhere(function($query){
                    $query->whereStatus(1);
                    $query->orderBy('ordering','asc');
                    $query->whereHas('childs',function($query){
                        $query->select('slug','parent','name');
                        $query->whereStatus(1);

                        $query->whereHas('rolePermissions',function($query){
                            $query->where('role_permissions.role_id','=',auth('admin')->user()->role_id);
                            $query->whereRaw("role_permissions.permission_key = concat('browse_',laravel_reserved_0.slug)");
                        });
                    });
                })->with(['childs'=>function($query){
                    $query->select('slug','parent','name');
                    $query->whereStatus(1);

                    $query->whereHas('rolePermissions',function($query){
                        $query->where('role_permissions.role_id','=',auth('admin')->user()->role_id);
                        $query->whereRaw("role_permissions.permission_key = concat('browse_',menus.slug)");
                    });
                }])
                ->orderBy('ordering','asc')
                ->get();
            @endphp


            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <div class="d-flex align-items-center gap-10 justify-content-between">
                    <ul class="navbar-nav" id="navbar-nav">

                        @foreach ($menus as $menu)
                            @if(!$menu->childs->count() && Route::has("admin.".Str::slug($menu->slug, '-').".index"))
                                <li class="nav-item {{ request()->segment(2) == Str::slug($menu->slug, '-')?'mm-active pr-active':''}}">
                                    <a href="{{ route("admin.".Str::slug($menu->slug, '-').".index")}}" class="nav-link {{ request()->segment(2) == Str::slug($menu->slug, '-')?'active':''}}">
                                        <i class="{{ $menu->icon??'fa fa-arrow-right' }}"></i> 
                                        <span>{{ $menu->name }}</span>
                                    </a>
                                </li>
                            @endif
                            @if($menu->childs->count())


                            <li class="nav-item {{ ($menu->childs->whereIn('slug',str_replace('-', '_', request()->segment(2)))->count())?'mm-active pr-active':'' }}">
                                <a href="#menu-{{ $menu->slug }}" class="nav-link menu-link {{ ($menu->childs->whereIn('slug',str_replace('-', '_', request()->segment(2)))->count())?'collapsed active':'' }}" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="{{ $menu->icon??'fa fa-list' }}"></i>
                                    <span data-key="{{ $menu->slug }}">{{ $menu->name }}</span>
                                </a>
                                <div class="collapse menu-dropdown {{ ($menu->childs->whereIn('slug',str_replace('-', '_', request()->segment(2)))->count())?'show':'' }}" id="menu-{{ $menu->slug }}">
                                      <ul class="nav nav-sm flex-column" aria-expanded="false">

                                         @foreach($menu->childs as $child)
                                             @if(Route::has("admin.".Str::slug($child->slug, '-').".index"))
                                                <li class="nav-item {{ ($child->slug == str_replace('-', '_', request()->segment(2)))?'mm-active pr-active':'' }}">
                                                    <a data-key="{{$child->slug}}" class="nav-link {{ ($child->slug == str_replace('-', '_', request()->segment(2)))?'active':'' }}" href="{{ route('admin.'.Str::slug($child->slug, '-').'.index')}}">{{ $child->name }}</a>
                                                </li>
                                             @endif

                                          @endforeach   
                                        
                                      </ul>
                                </div>
                            </li>

                            @endif
                        @endforeach 


                    
                    </ul>

                    {{-- <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link menu-link collapsed" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                                <i class="ri-rocket-line"></i> <span data-key="t-landing">Landing</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarLanding">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="landing.html" class="nav-link" data-key="t-one-page"> One Page </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="nft-landing.html" class="nav-link" data-key="t-nft-landing"> NFT Landing </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="job-landing.html" class="nav-link" data-key="t-job">Job</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul> --}}
                </div>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
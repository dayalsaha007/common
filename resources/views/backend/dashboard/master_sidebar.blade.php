<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="#" class="logo logo-light">
        <span class="logo-lg">
            {{-- <img src="{{ asset('backend/assets/images/logo.png') }}" alt="logo"> --}}
        </span>
        <span class="logo-sm">
            {{-- <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="small logo"> --}}
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="#" class="logo logo-dark">
        <span class="logo-lg">

            <h3 class="main_das" > Dashboard</h3>
            {{-- <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="dark logo"> --}}
        </span>
        <span class="logo-sm">
           <h3 class="main_das">D</h3>
            {{-- <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="small logo"> --}}
        </span>
    </a>
    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="#">
                <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}" alt="user-image" height="42" class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">Michael Berndt</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-item">
                <a href="{{ route('index') }}" class="side-nav-link">
                    <i class="ri-dashboard-2-fill"></i>
                    <span> {{ __('translate.Dashboard') }} </span>
                </a>
            </li>

            <style>

                    h3.main_das {
                        padding-top: 13px;
                    }

            </style>


                <!----------sidebar start--------------->
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarBaseUI" aria-expanded="false" aria-controls="sidebarBaseUI" class="side-nav-link">
                                <i class="ri-briefcase-fill"></i>
                                <span> Profile </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBaseUI">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route('profile_change') }}">Profile Change</a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons" class="side-nav-link">
                                <i class="ri-service-fill"></i>
                                <span> Setting </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarIcons">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route('language') }}">Language</a>
                                    </li>
                                </ul>
                            </div>
                        </li>



                    </ul>
                </div>
            </li>




        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">

                            <img src="{{getAdminImage(Auth::guard('Admin')->user()->photo)}}" alt="users"
                                 class="rounded-circle img-fluid"/>

                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="nameOfUser m-b-10 user-name font-medium">{{ Auth::guard('Admin')->user()->name }}</h5>
                            <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button"
                               data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="ti-settings"></i>
                            </a>
                            <a href="javascript:void(0)" title="Logout" class="btn btn-circle btn-sm">
                                <i class="ti-power-off"></i>
                            </a>
                            <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="{{route('profile.index')}}">
                                    <a class="dropdown-item" href="{{route('user.logout')}}">
                                        <i class="fa fa-power-off m-r-5 m-l-5"></i> log out</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- main routes section-->
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">الاعدادات الرئيسيه</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('admin.dashboard')}}"
                       aria-expanded="false">
                        <i class="fa fa-home"></i>
                        <span class="hide-menu">الصفحه الرئيسيه </span>
                    </a>
                </li>


                {{--                <li class="sidebar-item">--}}
                {{--                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"--}}
                {{--                       aria-expanded="false">--}}
                {{--                        <i class="icon-Add-UserStar"></i>--}}
                {{--                        <span class="hide-menu"> المديرين والمستخدمين </span>--}}
                {{--                    </a>--}}
                {{--                    <ul aria-expanded="false" class="collapse  first-level">--}}
                {{--                        @if(in_array(9,adminsRoleArray(Auth::guard('Admin')->user())))--}}
                {{--                        <li class="sidebar-item">--}}
                {{--                            <a class="sidebar-link  waves-effect waves-dark" href="{{route('Admin.index')}}"--}}
                {{--                               aria-expanded="false">--}}
                {{--                                <i class="icon-Administrator"></i>--}}
                {{--                                <span class="hide-menu">المديرين</span>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                        @endif--}}

                {{--                    </ul>--}}
                {{--                </li>--}}


                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('Sliders.index')}}" aria-expanded="false">
                        <i class="icon-File-TextImage"></i>
                        <span class="hide-menu">صور السلايدر </span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('Categories.index')}}" aria-expanded="false">
                        <i class="fa fa-stack"></i>
                        <span class="hide-menu">الاقسام </span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('Products.index')}}" aria-expanded="false">
                        <i class="fa fa-shopping-bag"></i>
                        <span class="hide-menu">المنتجات </span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('Projects.index')}}" aria-expanded="false">
                        <i class="fa fa-building"></i>
                        <span class="hide-menu">المشاريع </span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('NewsLetter.index')}}" aria-expanded="false">
                        <i class="fa fa-envelope-open"></i>
                        <span class="hide-menu">مشتركي الرسائل البريديه</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('Massages.index')}}" aria-expanded="false">
                        <i class="fa fa-pencil"></i>
                        <span class="hide-menu"> رسائل الزوار</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('About.index')}}" aria-expanded="false">
                        <i class="fa fa-info"></i>
                        <span class="hide-menu">معلومات الموقع </span>
                    </a>
                </li>

{{--                <li class="sidebar-item">--}}
{{--                    <a class="sidebar-link  waves-effect waves-dark" href="{{route('Contact_us.index')}}" aria-expanded="false">--}}
{{--                        <i class="fa fa-phone"></i>--}}
{{--                        <span class="hide-menu">تواصل معنا</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <!--end main routes section-->

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Admin | Dashboard')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= asset('assets/img/favicon.png') ?>" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="<?= asset('assets/fonts/fonts.css') ?>" rel="stylesheet">


    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>


    <!-- Vendor CSS Files -->
    <link href="<?= asset('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/vendor/quill/quill.snow.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/vendor/simple-datatables/style.css') ?>" rel="stylesheet">
    <link href="<?= asset('assets/css/style.css') ?>" rel="stylesheet">
</head>

<body>
    @if (Session::has('message'))
        <div class="alert alert-success custom_alert" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger custom_alert" role="alert">
            {{ Session::get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">{{ config('app.name') }}</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset('assets/img/messages-1.jpg') }}" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset('assets/img/messages-2.jpg') }}" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset('assets/img/messages-3.jpg') }}" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->role->name }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) != 'dashboard' ? 'collapsed' : '' }}"
                href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">

                <a class="nav-link {{ Request::segment(1) == 'user' ? '' : 'collapsed' }}"
                    data-bs-target="#users" data-bs-toggle="collapse" href="#">
                    <i class="ri-home-3-line"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="users" class="nav-content collapse {{ Request::segment(1) == 'user' ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('user.create') }}" class="{{ Request::segment(1) == 'user' && Request::segment(2) == 'create' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.index') }}" class="{{ Request::segment(1) == 'user' && Request::segment(2) == '' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>View</span>
                        </a>
                    </li>
                </ul>
            </li>


            <!-- <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) == 'role' ? '' : 'collapsed' }}"
                    data-bs-target="#roles" data-bs-toggle="collapse" href="#">
                    <i class="ri-home-3-line"></i><span>Roles</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="roles" class="nav-content collapse {{ Request::segment(1) == 'role' ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('role.create') }}" class="{{ Request::segment(1) == 'role' && Request::segment(2) == 'create' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('role.index') }}" class="{{ Request::segment(1) == 'role' && Request::segment(2) == '' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>View</span>
                        </a>
                    </li>
                </ul>
            </li> -->

            <!-- <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) == 'permission' ? '' : 'collapsed' }}"
                    data-bs-target="#permissions" data-bs-toggle="collapse" href="#">
                    <i class="ri-home-3-line"></i><span>Permissions</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="permissions" class="nav-content collapse {{ Request::segment(1) == 'permission' ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('permission.create') }}" class="{{ Request::segment(1) == 'permission' && Request::segment(2) == 'create' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('permission.index') }}" class="{{ Request::segment(1) == 'permission' && Request::segment(2) == '' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>View</span>
                        </a>
                    </li>
                </ul>
            </li> -->

            <!-- <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) == 'permission_to_role' ? '' : 'collapsed' }}"
                    data-bs-target="#permission_to_role" data-bs-toggle="collapse" href="#">
                    <i class="ri-home-3-line"></i><span>Permission to Role</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="permission_to_role" class="nav-content collapse {{ Request::segment(1) == 'permission_to_role' ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('permission_to_role.create') }}" class="{{ Request::segment(1) == 'permission_to_role' && Request::segment(2) == 'create' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('permission_to_role.index') }}" class="{{ Request::segment(1) == 'permission_to_role' && Request::segment(2) == '' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>View</span>
                        </a>
                    </li>
                </ul>
            </li> -->

            <!-- <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) == 'permission_to_route' ? '' : 'collapsed' }}"
                    data-bs-target="#permission_to_route" data-bs-toggle="collapse" href="#">
                    <i class="ri-home-3-line"></i><span>Permission to Router</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="permission_to_route" class="nav-content collapse {{ Request::segment(1) == 'permission_to_route' ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('permission_to_route.create') }}" class="{{ Request::segment(1) == 'permission_to_route' && Request::segment(2) == 'create' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('permission_to_route.index') }}" class="{{ Request::segment(1) == 'permission_to_route' && Request::segment(2) == '' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>View</span>
                        </a>
                    </li>
                </ul>
            </li> -->


            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) == 'houses' ? '' : 'collapsed' }}"
                    data-bs-target="#houses" data-bs-toggle="collapse" href="#">
                    <i class="ri-home-3-line"></i><span>Houses</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="houses" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('houses.create') }}" class="">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('houses.index') }}" class="">
                            <i class="bi bi-circle"></i><span>View</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) == 'tenants' ? '' : 'collapsed' }}"
                    data-bs-target="#tenants" data-bs-toggle="collapse" href="#">
                    <i class="ri-home-3-line"></i><span>Tenants</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tenants" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('tenants.create') }}" class="">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tenants.index') }}" class="">
                            <i class="bi bi-circle"></i><span>View</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) == 'rents' ? '' : 'collapsed' }}"
                    data-bs-target="#rents" data-bs-toggle="collapse" href="#">
                    <i class="ri-home-3-line"></i><span>Rents</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="rents" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('rents.create') }}" class="">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('rents.index') }}" class="">
                            <i class="bi bi-circle"></i><span>View</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('rents.due-report') }}" class="">
                            <i class="bi bi-circle"></i><span>Due</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) == 'flats' ? '' : 'collapsed' }}"
                    data-bs-target="#flats" data-bs-toggle="collapse" href="#">
                    <i class="ri-home-3-line"></i><span>Flats</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="flats" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('flats.create') }}" class="">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('flats.index') }}" class="">
                            <i class="bi bi-circle"></i><span>View</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) == 'electricitys' ? '' : 'collapsed' }}"
                    data-bs-target="#electricBill" data-bs-toggle="collapse" href="#">
                    <i class="ri-home-3-line"></i><span>Electric Bill</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="electricBill" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('electricitys.create') }}" class="">
                            <i class="bi bi-circle"></i><span>Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('electricitys.index') }}" class="">
                            <i class="bi bi-circle"></i><span>View</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('electric.bill.create') }}" class="">
                            <i class="bi bi-circle"></i><span>Bill Create</span>
                        </a>
                    </li>
                </ul>
            </li>



        </ul>

    </aside><!-- End Sidebar-->
    <main id="main" class="main">
        @yield('content')
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>{{ config('app.name') }}</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/custom_js.js') }}"></script>
</body>

</html>

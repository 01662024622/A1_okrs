<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HTAuto</title>
    <link rel="shortcut icon" href="/crop-logo.png">
    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="/css/main/errors.css">
    @yield('css')

</head>
<body id="page-top" class="sidebar-toggled">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            {{-- <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-laugh-wink"></i>
            </div> --}}
            @if (Auth::user()->role==50)
                NHÂN VIÊN
            @elseif(Auth::user()->role==100)
                QUẢN LÝ
            @else ADMIN
            @endif

        </a>

        <!-- Divider -->
        {!! $nav !!}
{{--        {!! $navx !!}--}}


    {{-- <li class="nav-item">
        <a class="nav-link" href="/gioi-thieu">
            <span>Giới Thiệu</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/contact">
            <span>Liên Hệ và Phản Ánh</span></a>
    </li> --}}
    <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <img src="/logo.png" class="img-fluid" alt="" style="height: 100%">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Topbar Search -->
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
{{--                    <li class="nav-item dropdown no-arrow d-sm-none">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"--}}
{{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="fas fa-search fa-fw"></i>--}}
{{--                        </a>--}}
{{--                        <!-- Dropdown - Messages -->--}}
{{--                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"--}}
{{--                             aria-labelledby="searchDropdown">--}}
{{--                            <form class="form-inline mr-auto w-100 navbar-search">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control bg-light border-0 small"--}}
{{--                                           placeholder="Search for..." aria-label="Search"--}}
{{--                                           aria-describedby="basic-addon2">--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <button class="btn btn-primary" type="button">--}}
{{--                                            <i class="fas fa-search fa-sm"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <!-- Nav Item - Alerts -->--}}
{{--                    <li class="nav-item dropdown no-arrow mx-1">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"--}}
{{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="fas fa-bell fa-fw"></i>--}}
{{--                            <!-- Counter - Alerts -->--}}
{{--                            <span class="badge badge-danger badge-counter">3+</span>--}}
{{--                        </a>--}}
{{--                        <!-- Dropdown - Alerts -->--}}
{{--                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"--}}
{{--                             aria-labelledby="alertsDropdown">--}}
{{--                            <h6 class="dropdown-header">--}}
{{--                                Alerts Center--}}
{{--                            </h6>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="mr-3">--}}
{{--                                    <div class="icon-circle bg-primary">--}}
{{--                                        <i class="fas fa-file-alt text-white"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="small text-gray-500">December 12, 2019</div>--}}
{{--                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="mr-3">--}}
{{--                                    <div class="icon-circle bg-success">--}}
{{--                                        <i class="fas fa-donate text-white"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="small text-gray-500">December 7, 2019</div>--}}
{{--                                    $290.29 has been deposited into your account!--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="mr-3">--}}
{{--                                    <div class="icon-circle bg-warning">--}}
{{--                                        <i class="fas fa-exclamation-triangle text-white"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="small text-gray-500">December 2, 2019</div>--}}
{{--                                    Spending Alert: We've noticed unusually high spending for your account.--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <!-- Nav Item - Messages -->--}}
{{--                    <li class="nav-item dropdown no-arrow mx-1">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"--}}
{{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="fas fa-envelope fa-fw"></i>--}}
{{--                            <!-- Counter - Messages -->--}}
{{--                            <span class="badge badge-danger badge-counter">7</span>--}}
{{--                        </a>--}}
{{--                        <!-- Dropdown - Messages -->--}}
{{--                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"--}}
{{--                             aria-labelledby="messagesDropdown">--}}
{{--                            <h6 class="dropdown-header">--}}
{{--                                Message Center--}}
{{--                            </h6>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="dropdown-list-image mr-3">--}}
{{--                                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"--}}
{{--                                         alt="">--}}
{{--                                    <div class="status-indicator bg-success"></div>--}}
{{--                                </div>--}}
{{--                                <div class="font-weight-bold">--}}
{{--                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a--}}
{{--                                        problem I've been having.--}}
{{--                                    </div>--}}
{{--                                    <div class="small text-gray-500">Emily Fowler · 58m</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="dropdown-list-image mr-3">--}}
{{--                                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60"--}}
{{--                                         alt="">--}}
{{--                                    <div class="status-indicator"></div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="text-truncate">I have the photos that you ordered last month, how would--}}
{{--                                        you like them sent to you?--}}
{{--                                    </div>--}}
{{--                                    <div class="small text-gray-500">Jae Chun · 1d</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="dropdown-list-image mr-3">--}}
{{--                                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60"--}}
{{--                                         alt="">--}}
{{--                                    <div class="status-indicator bg-warning"></div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="text-truncate">Last month's report looks great, I am very happy with the--}}
{{--                                        progress so far, keep up the good work!--}}
{{--                                    </div>--}}
{{--                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="dropdown-list-image mr-3">--}}
{{--                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"--}}
{{--                                         alt="">--}}
{{--                                    <div class="status-indicator bg-success"></div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told--}}
{{--                                        me that people say this to all dogs, even if they aren't good...--}}
{{--                                    </div>--}}
{{--                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <div class="topbar-divider d-none d-sm-block"></div>--}}
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span
                                class="mr-2 d-none d-lg-inline text-gray-600 small">{{ strtoupper(Auth::user()->tagname) }}</span>
                            <img class="img-profile rounded-circle" src="{{ Auth::user()->avata }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="/profile">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Hồ sơ
                            </a>
                            <a class="dropdown-item" href="/change-password">
                                <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                                Đổi mật khẩu
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Đăng xuất
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- 404 Error Text -->
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>COPYRIGHT © 1990 – 2020 HTAUTO. ALL RIGHTS RESERVED.</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn chắc chắn chứ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Click "Đăng xuất" bạn sẽ thoát khỏi phiên làm việc.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                <a class="btn btn-primary" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Đăng xuất</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>


<div id="load_page">
    <div class="loader"></div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('/js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
@yield('js')
</body>

</html>

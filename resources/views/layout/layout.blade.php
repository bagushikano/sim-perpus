<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIM Perpustakaan</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('template/sbadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="{{ asset('template/sbadmin/nuito.css')}}"
        rel="stylesheet">

        <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('template/sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="{{asset('template/sbadmin/jquery-3.5.1.js')}}" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link href="{{ asset('template/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        #mapid { height: 50vh; }
    </style>
    {{-- @stack('duar') --}}
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-text mx-2">SIM Perpustakaan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item " id="beranda">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="nav-link p-0 m-0">
                    @csrf
                    <a class="nav-link" onclick='this.parentNode.submit(); return false;'>
                        <i class="fas fa-fw fa-arrow-left"></i>
                        <span>Logout</span>
                    </a>
                </form>
            </li>

            <li class="nav-item" id="about">
                <a class="nav-link" onclick="openAboutModal();">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Tentang aplikasi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen perpustakaan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" id="penerbit">
                <a class="nav-link" href="{{ route('penerbit') }}">
                    <i class="fas fa-fw fa-book-reader"></i>
                    <span>Manajemen penerbit</span></a>
            </li>

            <li class="nav-item" id="buku">
                <a class="nav-link" href="{{ route('buku') }}">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Manajemen buku</span></a>
            </li>

            <li class="nav-item" id="peminjam">
                <a class="nav-link" href="{{ route('peminjam') }}">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Manajemen peminjam</span></a>
            </li></span></a>
            </li>

            <li class="nav-item" id="pinjam">
                <a class="nav-link" href="{{ route('pinjam') }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Manajemen pinjam</span></a>
            </li></span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen admin
            </div>

            <li class="nav-item" id="passchange">
                <a class="nav-link" href="{{ route('change-admin-pass') }}">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Ganti password admin</span></a>
            </li></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            @yield('content')
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('/layout/about-modal')

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('template/sbadmin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/sbadmin/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('template/sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>

        function openAboutModal() {
            $('#aboutApp').modal('show');
        }
        function alertDone(msg){
          Swal.fire({
            title: "Berhasil",
            text: msg,
            icon: "success",
            button: "Oke",
          });
        }

        function alertWarning(msg){
          Swal.fire({
            title: "Eror",
            text: msg,
            icon: "warning",
            button: "Oke",
          });
        }

        function alertFail(msg){
          Swal.fire({
            title: "Gagal",
            text: msg,
            icon: "error",
            button: "Oke",
          });
        }
    </script>
    @stack("anjay")
</body>
</html>

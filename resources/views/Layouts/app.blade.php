<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SB Admin 2 CSS -->
    <link href="{{ asset('startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar (optional, bisa tambahin di sini) -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar (optional, bisa tambahin navbar di sini) -->

                <!-- Main Content -->
                <div class="container-fluid mt-4">
                    @yield('content') {{-- ISI UTAMA DI SINI --}}
                </div>

            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Scripts -->
    <script src="{{ asset('startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('startbootstrap-sb-admin-2-gh-pages/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('startbootstrap-sb-admin-2-gh-pages/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Optional: DataTables Init -->
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"
    style="background: rgba(40, 167, 69, 0.2); border: 1px solid rgba(40, 167, 69, 0.5); color: #155724;">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert"
    style="background: rgba(220, 53, 69, 0.2); border: 1px solid rgba(220, 53, 69, 0.5); color: #721c24;">
    {{ session('error') }}
</div>
@endif
@section('isi')
</body>
</html>

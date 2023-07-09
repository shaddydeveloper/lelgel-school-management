<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $chemical_info->name }} | Lelgel Secondary School</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->

    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/dropzone/min/dropzone.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    @include('sweetalert::alert')
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">User Details</span>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('user_profile') }}" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('user_logout') }}" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>

                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">

                <span class="brand-text font-weight-light">School Management</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">

                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Home</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{-- <i class="nav-icon fas fa-copy"></i> --}}
                                <p>
                                    Students Management
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('students') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Students</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{-- <i class="nav-icon fas fa-copy"></i> --}}
                                <p>
                                    Teachers Management
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('teachers') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Teachers</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('teachers_accessories') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Teachers Accessories</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{-- <i class="nav-icon fas fa-copy"></i> --}}
                                <p>
                                    Books Management
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('exercise_books') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Exercise Books</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('textbooks') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Text Books</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('assigned_textbooks') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Assigned Text Books</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{-- <i class="nav-icon fas fa-copy"></i> --}}
                                <p>
                                    Fee Management
                                    <i class="fas fa-angle-left right"></i>
                                    {{-- <span class="badge badge-info right">6</span> --}}
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('transactions') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fee Transactions</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('fee_balance') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fee Balances</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{-- <i class="nav-icon fas fa-copy"></i> --}}
                                <p>
                                    Store Management
                                    <i class="fas fa-angle-left right"></i>
                                    {{-- <span class="badge badge-info right">6</span> --}}
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('food_stuff') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Food Stuff</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('daily_expenses') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Daily Expenses</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('food_expenditures') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Food Expenditures</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('teachers_accessories') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Teaching Assecories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('student_accessories') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Students Assecories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('student_accessories_assignment') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Students Assecories Assignment</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('games_equipments') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Games Equipments</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('assigned_games_equipments') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Games Equipment Assignment</p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplies</p>
                </a>
              </li> --}}
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                {{-- <i class="nav-icon fas fa-copy"></i> --}}
                                <p>
                                    Laboratory Management
                                    <i class="fas fa-angle-left right"></i>
                                    {{-- <span class="badge badge-info right">6</span> --}}
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('apparatus') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Apparatus</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('chemicals') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Chemicals</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{{ $chemical_info->name }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Chemicals</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <section style="background-color: #eee;">
                    <div class="container py-2">


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <form action="{{ route('update_chemical', $chemical_info) }}" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Chemical Name</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $chemical_info->name }}"
                                                        placeholder="Chemical Name" required>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Quantity</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="number" name="quantity" id="quantity"
                                                        class="form-control" placeholder="Quantity"
                                                        value="{{ $chemical_info->quantity }}" required>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Unit Of Measure</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select name="unit_of_measure" id="unit_of_measure"
                                                        class="form-control" required>
                                                        <option value="{{ $chemical_info->unit_of_measure }}">
                                                            {{ $chemical_info->unit_of_measure }}</option>
                                                        <option value="Kg">Kilograms(Kg)</option>
                                                        <option value="g">Grams</option>
                                                        <option value="L">Litres(L)</option>
                                                        <option value="Ml">Millilitres(Ml)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="submit" value="Update" class="btn btn-info">

                                        </div>
                                    </form>

                                </div>

                            </div>

                        </div>
                    </div>
                </section>
        </div>
    </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Developed by: <a href="#">CashaTech Technologies</a>.</strong>

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('adminlte/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <!-- dropzonejs -->
    <script src="{{ asset('adminlte/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
    <script>
        $(function() {

            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>

@extends('layouts.admin', [
    'title' => 'Form Three',
    'class_open_student_management' => 'menu-open',
    'class_student_management' => 'active',
    'class_form_three' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Students</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Students</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- modal --}}
                <div class="modal fade" id="modal-overlay">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header bg-success">
                                <h4 class="modal-title">Add Student</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('add_student') }}" method="POST" class="row" id="student-form">
                                    {{ csrf_field() }}
                                    <div class="form-group col-lg-12">
                                        <label for="adm" class="form-label">Admission Number <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="adm" id="adm" class="form-control" required
                                            placeholder="Admission:">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="upi_number" class="form-label">UPI Number</label>
                                        <input type="text" name="upi_number" id="upi_number" class="form-control"
                                            placeholder="UPI Number">

                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="name" class="form-label">Full Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" required
                                            placeholder="Full Name:">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="">--- Select Gender ---</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="class" class="form-label">Class <span
                                                class="text-danger">*</span></label>
                                        <select name="class" id="class" class="form-control" required>
                                            <option value="">--- Select Class ---</option>
                                            <option value="form1">Form 1</option>
                                            <option value="form2">Form 2</option>
                                            <option value="form3">Form 3</option>
                                            <option value="form4">Form 4</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="parent_phone" class="form-label">Parent Phone </label>
                                        <input type="tel" name="parent_phone" id="parent_phone" class="form-control"
                                            placeholder="Parent Number:">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="year_joined" class="form-label">Year Joined <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="year_joined" id="year_joined" class="form-control"
                                            required placeholder="Year Joined:">
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" form="student-form">Submit</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                {{-- modal --}}
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header  col-12">
                                <h3 class="card-title">List of Students</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Add Student</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Admission Number</th>
                                            <th>UPI Number</th>
                                            <th>Full Name</th>
                                            <th>Gender</th>
                                            <th>Class</th>
                                            <th>Parent Phone</th>
                                            <th>Year Joined</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->adm }}</td>
                                                <td>{{ $student->upi_number }}</td>
                                                <td><a
                                                        href="{{ url('student_profile/' . $student->student_id) }}">{{ $student->name }}</a>
                                                </td>
                                                <td>{{ $student->gender }}</td>
                                                <td>{{ $student->class }}</td>
                                                <td> {{ $student->parent_phone }}</td>
                                                <td>{{ $student->year_joined }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Admission Number</th>
                                            <th>UPI Number</th>
                                            <th>Full Name</th>
                                            <th>Gender</th>
                                            <th>Class</th>
                                            <th>Parent Phone</th>
                                            <th>Year Joined</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@extends('layouts.admin', [
    'title' => 'Teachers',
    'class_teacher_management' => 'active',
    'class_open_teacher_management' => 'menu-open',
    'class_teacher' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Teachers</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Teachers</li>
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
                                <h4 class="modal-title">Add Teacher</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('add_teacher') }}" method="POST" class="row" id="student-form">
                                    {{ csrf_field() }}

                                    <div class="form-group col-lg-12">
                                        <label for="name" class="form-label">Full Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" required
                                            placeholder="Full Name:">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="id_number" class="form-label">ID Number <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="id_number" id="id_number" class="form-control" required
                                            placeholder="ID Number:">
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="phone" class="form-label">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input type="tel" name="phone" id="phone" class="form-control" required
                                            placeholder="Phone Number:">
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
                                <h3 class="card-title">List of Teachers</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Add Teacher</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>Full Name</th>
                                            <th>Phone Number</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>{{ $teacher->id_number }}</td>
                                                <td><a
                                                        href="{{ url('teacher_profile/' . $teacher->teacher_id) }}">{{ $teacher->name }}</a>
                                                </td>
                                                <td> {{ $teacher->phone }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>Full Name</th>
                                            <th>Phone Number</th>
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

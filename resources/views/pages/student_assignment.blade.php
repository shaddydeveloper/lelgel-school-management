@extends('layouts.admin', [
    'title' => 'Student Accessories Assignment',
    'class_open_store_management' => 'menu-open',
    'class_student_accessories_assignment' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Students Accessories Assignment</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Students Accessories Assignment</li>
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
                                <h4 class="modal-title">Assign Students Accessories</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('assign_students_accessory') }}" method="POST" class="row"
                                    id="student-form">
                                    {{ csrf_field() }}
                                    <div class="form-group col-lg-12">
                                        <label>Accessory Name</label>
                                        <select name="accessory_name" class="form-control select2bs4" style="width: 100%;">
                                            <option selected="selected">--- Select Accessory ---</option>
                                            @foreach ($accessories as $accessory)
                                                <option value="{{ $accessory->name }}">{{ $accessory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label>Student Admission</label>
                                        <select name="adm" class="form-control select2bs4" style="width: 100%;">
                                            <option value="">--- Select Student Admission ---</option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->adm }}">
                                                    {{ $student->adm . ' ' . $student->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="quantity" class="form-label">Quantity <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="quantity" id="quantity" class="form-control"
                                            placeholder="Quantity:" required>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="date_given" class="form-label">Date Given <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="date_given" id="date_given" class="form-control"
                                            required>
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
                                <h3 class="card-title">List of Assigned Accessories</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Asign Student Accessory</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Accessory Name</th>
                                            <th>ADM</th>
                                            <th>Student Name</th>
                                            <th>Quantity</th>
                                            <th>Date Given</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($givenAccessories as $accessory)
                                            <tr>
                                                <td>{{ $accessory->accessory_name }}</td>
                                                <td>{{ $accessory->adm }}</td>
                                                <td>{{ $accessory->student_name }}</td>
                                                <td> {{ $accessory->quantity }}</td>
                                                <td>{{ $accessory->date_given }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Accessory Name</th>
                                            <th>ADM</th>
                                            <th>Student Name</th>
                                            <th>Quantity</th>
                                            <th>Date Given</th>
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

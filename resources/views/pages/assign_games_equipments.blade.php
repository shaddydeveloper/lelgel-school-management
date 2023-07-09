@extends('layouts.admin', ['title' => 'Assign Games Equipments', 'class_open_store_management' => 'menu-open', 'class_store_management' => 'active', 'class_assigned_games_equipments' => 'active'])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Assigned Games Equipments</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Assigned Games Equipments</li>
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
                                <h4 class="modal-title">Assign Games Equipment</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('assign_games_equipment') }}" method="POST" class="row"
                                    id="student-form">
                                    {{ csrf_field() }}

                                    <div class="form-group col-lg-12">
                                        <label>Equipment Name</label>
                                        <select name="equipment_id" class="form-control select2bs4" style="width: 100%;">
                                            <option selected="selected">--- Select Equipment ---</option>
                                            @foreach ($equipments as $equipment)
                                                <option value="{{ $equipment->equipment_id }}">
                                                    {{ $equipment->name }}</option>
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
                                <h3 class="card-title">List of Assigned Games Equipments</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Asign Textbook</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Student Admission</th>
                                            <th>Student Name</th>
                                            <th>Date Given</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assigned_equipments as $equipment)
                                            <tr>
                                                <td>{{ $equipment->name }}</td>
                                                <td>{{ $equipment->department }}</td>
                                                <td>
                                                    {{ $equipment->adm }}
                                                </td>
                                                <td>{{ $equipment->student_name }}</td>
                                                <td>{{ $equipment->date_given }}</td>
                                                <td>
                                                    <div class="action-buttons d-flex p-2">

                                                        <a href="#" class="btn btn-success show_confirm"
                                                            data-toggle="tooltip" title="Collect Book"><i
                                                                class="fa fa-edit"></i></a>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Student Admission</th>
                                            <th>Student Name</th>
                                            <th>Date Given</th>
                                            <th></th>
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

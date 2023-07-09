@extends('layouts.admin', [
    'title' => 'Teachers Accessories',
    'class_open_store_management' => 'menu-open',
    'class_store_management' => 'active',
    'class_teacher_accessories' => 'active',
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
                            <li class="breadcrumb-item active">Teachers Accessories</li>
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
                                <h4 class="modal-title">Give Out Accessory</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('assign_accessory') }}" method="POST" class="row"
                                    id="student-form">
                                    {{ csrf_field() }}
                                    <div class="form-group col-lg-12">
                                        <label for="accessory_id" class="form-label">Accessory <span
                                                class="text-danger">*</span></label>
                                        <select name="accessory_id" id="accessory_id" class="form-control">
                                            <option value="">--Select Accessory---</option>
                                            <option value="pens">Pens</option>
                                            <option value="ink">Ink</option>
                                            <option value="exercise book">Exercise Book</option>
                                            <option value="text book">Text Book</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="teacher_id" class="form-label">Teacher <span
                                                class="text-danger">*</span></label>
                                        <select name="teacher_id" id="teacher_id" class="form-control">
                                            <option value="">--- Select a Teacher ---</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->teacher_id }}">{{ $teacher->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="date_assigned" class="form-label">Date Assigned <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="date_assigned" id="date_assigned" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="quantity" class="form-label">Quantity <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="quantity" id="quantity" class="form-control">
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
                                <h3 class="card-title">List of Teachers Accessories</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Assign Assecory</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Accessory</th>
                                            <th>Teacher</th>
                                            <th>Date Assigned</th>
                                            <th>Quantity</th>
                                            <th>Assigned By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assigned_accessories as $accessory)
                                            <tr>
                                                <td>{{ $accessory->assigned_id }}</td>
                                                <td><a href="#">{{ $accessory->accessory_name }}</a></td>
                                                <td>{{ $accessory->teacher_name }}</td>
                                                <td> {{ $accessory->date_assigned }}</td>
                                                <td>{{ $accessory->quantity }}</td>
                                                <td>{{ $accessory->assigned_by }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Accessory</th>
                                            <th>Teacher</th>
                                            <th>Date Assigned</th>
                                            <th>Quantity</th>
                                            <th>Assigned By</th>
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

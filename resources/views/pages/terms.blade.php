@extends('layouts.admin', [
    'title' => 'Terms Configuration',
    'class_open_system_configuration' => 'menu-open',
    'class_system_configuration' => 'active',
    'class_terms' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Termly Configurations</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Terms</li>
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
                                <h4 class="modal-title">Add Term</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('add_term') }}" method="POST" class="row" id="student-form">
                                    {{ csrf_field() }}
                                    <div class="form-group col-lg-12">
                                        <label for="name">Term Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="eg. Term One" required>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="start_date" class="form-label">Opening Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="start_date" id="start_date" class="form-control"
                                            required>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="end_date" class="form-label">Closing Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="fee_amount" class="form-label">Fee Amount:</label>
                                        <input type="number" name="fee_amount" id="fee_amount" class="form-control"
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
                                <h3 class="card-title">List of Terms</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Add Term</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Opening Date</th>
                                            <th>Closing Date</th>
                                            <th>Fee Amount</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($terms as $term)
                                            <tr>

                                                <td>{{ $term->name }}</td>
                                                <td>{{ $term->start_date }}</td>
                                                <td>{{ $term->end_date }}</td>
                                                <td>{{ $term->fee_amount }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Opening Date</th>
                                            <th>Closing Date</th>
                                            <th>Fee Amount</th>
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

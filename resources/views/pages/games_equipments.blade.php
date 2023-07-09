@extends('layouts.admin', [
    'title' => 'Games Equipments',
    'class_open_store_management' => 'menu-open',
    'class_store_management' => 'active',
    'class_games_equipments' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Games Equipments</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Food Stuff</li>
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
                                <h4 class="modal-title">Add Games Equipment</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('add_games_equipment') }}" method="POST" class="row"
                                    id="student-form">
                                    {{ csrf_field() }}
                                    <div class="form-group col-lg-12">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Equipment Name" required>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="category" class="form-label">Category</label>
                                        <select name="category" id="category" class="form-control" required>
                                            <option value="">--- Select Category ---</option>
                                            <option value="Football">Football</option>
                                            <option value="Volleyball">Volleyball</option>
                                            <option value="Netball">Netball</option>
                                            <option value="Handball">Handball</option>
                                            <option value="Athletics">Athletics</option>
                                            <option value="Field Events">Field Events</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="quantity" class="form-label">Quantity </label>
                                        <input type="number" name="quantity" id="quantity" class="form-control" required
                                            placeholder="Quantity" step="0.01">
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
                                <h3 class="card-title">List of Games Equipments</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Add Games Equipment</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>

                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Quantity</th>
                                            <th></th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($equipments as $stuff)
                                            <tr>
                                                <td>{{ $stuff->name }}</td>
                                                <td>{{ $stuff->category }}</td>
                                                <td>{{ $stuff->quantity . ' ' . $stuff->unit_of_measure }}</td>
                                                <td>
                                                    <div class="action-buttons d-flex p-2">
                                                        <a href="{{ route('games_equipments_profile', $stuff->equipment_id) }}"
                                                            class="btn btn-success mr-2"><i class="fa fa-eye"></i></a>
                                                        <button type="submit" class="btn btn-danger show_confirm"
                                                            data-toggle="tooltip" title="Delete"><i
                                                                class="fa fa-trash"></i></button>

                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Department</th>
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

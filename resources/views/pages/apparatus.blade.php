@extends('layouts.admin', ['title' => 'Laboratory Apparatus', 'class_open_laboratory_management' => 'menu-open', 'class_apparatus' => 'active', 'class_laboratory_management' => 'active'])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Laboratory Apparatus</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Apparatus</li>
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
                                <h4 class="modal-title">Add Apparator</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('add_apparator') }}" method="POST" class="row" id="student-form">
                                    {{ csrf_field() }}
                                    <div class="form-group col-lg-12">
                                        <label for="name" class="form-label">Apparator Name:</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Apparator Name" required>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="quantity" class="form-label">Quantity </label>
                                        <input type="number" name="quantity" id="quantity" class="form-control" required
                                            placeholder="Quantity">
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
                                <h3 class="card-title">List of Laboratory Apparatus</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Add Apparator</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>

                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>...</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($apparatus as $apparator)
                                            <tr>

                                                <td><a href="#">{{ $apparator->name }}</a></td>
                                                <td>{{ $apparator->quantity }}</td>
                                                <td>
                                                    <div class="action-buttons d-flex p-2">
                                                        <a href="{{ route('edit_apparator', $apparator) }}"
                                                            class="btn btn-success mr-2"><i class="fa fa-edit"></i></a>
                                                        <form
                                                            action="{{ route('apparator.delete', $apparator->apparator_id) }}"
                                                            method="post">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit" class="btn btn-danger show_confirm"
                                                                data-toggle="tooltip" title="Delete"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>

                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>...</th>
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

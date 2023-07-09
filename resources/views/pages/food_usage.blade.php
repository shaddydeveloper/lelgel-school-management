@extends('layouts.admin', [
    'title' => 'Food Expenditure',
    'class_open_store_management' => 'menu-open',
    'class_store_management' => 'active',
    'class_food_expenditures' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Food Expenditures</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Food Expenditures</li>
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
                                <h4 class="modal-title">Add Food Expenditures</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('add_food_expenditure') }}" method="POST" class="row"
                                    id="student-form">
                                    {{ csrf_field() }}
                                    <div class="form-group col-lg-12">
                                        <label>Name</label>
                                        <select name="name" class="form-control select2bs4" style="width: 100%;"
                                            required>
                                            <option selected="selected">--- Select Food Stuff---</option>
                                            @foreach ($stuffs as $expenditure)
                                                <option value="{{ $expenditure->name }}">{{ $expenditure->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="quantity" class="form-label">Quantity <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="quantity" id="quantity" class="form-control" required
                                            placeholder="Quantity:">
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="date_taken" class="form-label">Date Taken <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="date_taken" id="date_taken" class="form-control"
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
                                <h3 class="card-title">List of Food Expenditures</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Give Food</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date Taken</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expenditures as $expenditure => $items)
                                            <tr>
                                                <td>{{ $expenditure }}</td>
                                                <td>
                                                    <ol>
                                                        @foreach ($items as $item)
                                                            <li>{{ $item->name }}</li>
                                                        @endforeach
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul>
                                                        @foreach ($items as $item)
                                                            <li>{{ $item->quantity }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td><a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Date Taken</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
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

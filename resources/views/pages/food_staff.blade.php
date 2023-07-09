@extends('layouts.admin', ['title' => 'Food Stuff', 'class_open_store_management' => 'menu-open', 'class_store_management' => 'active', 'class_food_stuff' => 'active'])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Food Stuff</h1>
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
                                <h4 class="modal-title">Add Food Suff</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('add_food_stuff') }}" method="POST" class="row"
                                    id="student-form">
                                    {{ csrf_field() }}
                                    <div class="form-group col-lg-12">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Food Stuff Name" required>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="quantity" class="form-label">Quantity </label>
                                        <input type="number" name="quantity" id="quantity" class="form-control" required
                                            placeholder="Quantity" step="0.01">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="unit_of_measure" class="form-label">Unit Of Measure</label>
                                        <select name="unit_of_measure" id="unit_of_measure" class="form-control" required>
                                            <option value="">--- Select Unit of Measure ---</option>
                                            <option value="Kg">Kilograms(Kg)</option>
                                            <option value="g">Grams</option>
                                            <option value="L">Litres(L)</option>
                                            <option value="Ml">Millilitres(Ml)</option>
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
                                <h3 class="card-title">List of Food Stuff</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Add Food Stuff</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>

                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th></th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stuffs as $stuff)
                                            <tr>
                                                <td><a href="#">{{ $stuff->name }}</a></td>
                                                <td>{{ $stuff->quantity . ' ' . $stuff->unit_of_measure }}</td>
                                                <td>
                                                    <div class="action-buttons d-flex p-2">
                                                        <a href="{{ url('update_food_stuff/' . $stuff->stuff_id) }}"
                                                            class="btn btn-success mr-2"><i class="fa fa-edit"></i></a>
                                                        <form action="{{ route('food.delete', $stuff->stuff_id) }}"
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

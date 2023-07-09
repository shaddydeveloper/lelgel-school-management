@extends('layouts.admin', [
    'title' => 'Daily Expenses',
    'class_open_store_management' => 'menu-open',
    'class_store_management' => 'active',
    'class_daily_expenses' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daily Expense</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Daily Expenses</li>
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
                                <h4 class="modal-title">Record Expense</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('add_daily_expenses') }}" method="POST" class="row"
                                    id="student-form">
                                    {{ csrf_field() }}
                                    <div class="form-group col-lg-12">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Expense Name" required>
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
                                            <option value="cc">Physical Count</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="price_per_item" class="form-label">Price Per Item</label>
                                        <input type="number" step="0.01" name="price_per_item" id="price_per_item"
                                            class="form-control" required placeholder="Price Per Item">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="date" class="form-label">Date Purchased</label>
                                        <input type="date" name="date" id="date" class="form-control">
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
                                <h3 class="card-title">List of Daily Expenses</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Record Expense</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>

                                            <th>Date</th>
                                            <th>Day</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                            <th>Daily Total</th>
                                            <th></th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stuffs as $stuff => $products)
                                            <tr>
                                                <td><a href="#">{{ $stuff }}</a></td>
                                                <td>{{ $products[0]->day }}</td>
                                                <td>
                                                    <ol>
                                                        @foreach ($products as $product)
                                                            <li>{{ $product->name }}</li>
                                                        @endforeach
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul>
                                                        @foreach ($products as $product)
                                                            <li>{{ $product->quantity . ' ' . $product->unit_of_measure }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        @foreach ($products as $product)
                                                            <li>{{ $product->total_price }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ $products->sum('total_price') }}</td>
                                                <td>...</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>Day</th>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                            <th>Daily Total</th>
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

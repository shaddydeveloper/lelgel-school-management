@extends('layouts.admin', [
    'title' => 'Student Accessories',
    'class_open_store_management' => 'menu-open',
    'class_store_management' => 'active',
    'class_student_accessories' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Students Accessories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Students Accessories</li>
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
                                <h4 class="modal-title">Add Students Accessory</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('add_student_accessory') }}" method="POST" class="row"
                                    id="student-form">
                                    {{ csrf_field() }}

                                    <div class="form-group col-lg-12">
                                        <label for="name" class="form-label">Accessory Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" required
                                            placeholder="Accessory Name:" value="{{ $book_name ?? '' }}">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="quantity" class="form-label">Quantity <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="quantity" id="quantity" class="form-control" required
                                            placeholder="Quantity:">
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="date_registered" class="form-label">Date Registered <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="date_registered" id="date_registered"
                                            class="form-control" required>
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
                                <h3 class="card-title">List of Students Accessories</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Add Students Accessory</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Accessory ID</th>
                                            <th>ACCESSORY NAME</th>
                                            <th>QUANTITY</th>
                                            <th>DATE REGISTERED</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accessories as $accessory)
                                            <tr>
                                                <td>{{ $accessory->accessory_id }}</td>
                                                <td><a href="#">{{ $accessory->name }}</a></td>
                                                <td> {{ $accessory->quantity }}</td>
                                                <td>{{ $accessory->date_registered }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Accessory ID</th>
                                            <th>ACCESSORY NAME</th>
                                            <th>QUANTITY</th>
                                            <th>DATE REGISTERED</th>
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

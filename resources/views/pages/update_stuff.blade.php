@extends('layouts.admin', [
    'title' => 'Food Stuff Update',
    'class_open_store_management' => 'menu-open',
    'class_store_management' => 'active',
    'class_food_stuff' => 'active',
])
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
                <div class="col-12">

                    <div class="card">
                        <div class="row">
                            <form action="{{ route('update_food_stuff') }}" method="POST" class="col-lg-12 row m-2"
                                id="student-form">
                                {{ csrf_field() }}
                                <input type="text" name="stuff_id" value="{{ $food_stuff->stuff_id }}" id=""
                                    hidden>
                                <div class="form-group col-lg-12">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" name="name" id="name" value="{{ $food_stuff->name }}"
                                        class="form-control" placeholder="Food Stuff Name">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="quantity" class="form-label">Quantity </label>
                                    <input type="number" name="quantity" id="quantity" class="form-control"
                                        placeholder="Quantity to Add" required>
                                </div>
                                <input type="text" value="{{ $food_stuff->unit_of_measure }}" name="unit_of_measure"
                                    hidden>

                                <input type="submit" value="Add Stock" class="btn btn-success">

                            </form>
                        </div>

                    </div>
                </div>

                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@extends('layouts.admin', [
    'title' => 'textbooks titles',
    'class_open_books_management' => 'menu-open',
    'class_books_management' => 'active',
    'class_assigned_textbooks' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Text Books Assignment</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Text Books</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header  col-12">
                                <h3 class="card-title">List of Text Books</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Book Title</th>
                                            <th>Subject</th>
                                            <th>Publisher</th>
                                            <th>Date Registered</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>

                                                <td><a
                                                        href="{{ url('assigned_textbooks/' . $book->title_id) }}">{{ $book->title }}</a>
                                                </td>
                                                <td>{{ $book->subject }}</td>
                                                <td>{{ $book->publisher }}</td>
                                                <td>{{ $book->date_registered }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Book Title</th>
                                            <th>Subject</th>
                                            <th>Publisher</th>
                                            <th>Date Registered</th>

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

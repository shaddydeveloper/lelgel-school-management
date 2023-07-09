@extends('layouts.admin', [
    'title' => $title_info->title,
    'class_books_management' => 'active',
    'class_open_books_management' => 'menu-open',
    'class_textbooks' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $title_info->title }}</h1>
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
                {{-- modal --}}
                <div class="modal fade" id="modal-overlay">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header bg-success">
                                <h4 class="modal-title">Add New Book</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('add_textbook') }}" method="POST" class="row" id="student-form">
                                    {{ csrf_field() }}
                                    <input type="text" name="title_id" id="title_id" value="{{ $title_info->title_id }}"
                                        hidden>
                                    <div class="form-group col-lg-12">
                                        <label for="title" class="form-label">Book Title</label>
                                        <select name="title" id="title" class="form-control">
                                            <option value="{{ $title_info->title }}">{{ $title_info->title }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="book_number">Book Number</label>
                                        <input type="text" name="book_number" id="book_number" class="form-control"
                                            placeholder="Text Book Number:" required>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="subject" class="form-label">Subject </label>
                                        <select name="subject" id="subject" class="form-control" required>
                                            <option value="{{ $title_info->subject }}">{{ $title_info->subject }}
                                            </option>
                                        </select>
                                    </div>

                                    {{-- <div class="form-group col-lg-12">
      <label for="date_registered" class="form-label">Date Registered <span class="text-danger">*</span></label>
      <input type="date" name="date_registered" id="date_registered" class="form-control" required >
  </div> --}}

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
                                <h3 class="card-title">List of {{ $title_info->title }} Text Books</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Add Text Book</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Book Title</th>
                                            <th>Book Number</th>
                                            <th>Subject</th>
                                            <th>Publisher</th>
                                            <th>Condition</th>
                                            <th>Date Registered</th>
                                            <th>...</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>{{ $book->title }}</td>
                                                <td><a
                                                        href="{{ url('textbook_info/' . $book->book_id) }}">{{ $book->book_number }}</a>
                                                </td>
                                                <td>{{ $book->subject }}</td>
                                                <td>{{ $title_info->publisher }}</td>
                                                <td> {{ $book->condition }}</td>
                                                <td>{{ $book->date_registered }}</td>
                                                <td>
                                                    <div class="action-buttons d-flex p-2">
                                                        <button class="btn btn-success mr-2"><i
                                                                class="fa fa-edit"></i></button>
                                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Book Title</th>
                                            <th>Book Number</th>
                                            <th>Subject</th>
                                            <th>Publisher</th>
                                            <th>Condition</th>
                                            <th>Date Registered</th>
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

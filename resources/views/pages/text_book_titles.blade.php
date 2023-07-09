@extends('layouts.admin', [
    'title' => 'Textbooks Titles',
    'class_open_books_management' => 'menu-open',
    'class_books_management' => 'active',
    'class_textbooks' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Text Books</h1>
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
                                <h4 class="modal-title">Add New Book Title</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('add_textbook_title') }}" method="POST" class="row"
                                    id="student-form">
                                    {{ csrf_field() }}
                                    <div class="form-group col-lg-12">
                                        <label for="title">Book Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="Text Book Title:">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="subject" class="form-label">Subject </label>
                                        <select name="subject" id="subject" class="form-control" required>
                                            <option value="">---Select Subject---</option>
                                            <option value="Mathematics">Mathematics</option>
                                            <option value="English">English</option>
                                            <option value="Kiswahili">Kiswahili</option>
                                            <option value="Chemistry">Chemistry</option>
                                            <option value="Biology">Biology</option>
                                            <option value="Physics">Physics</option>
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Business Studies">Business Studies</option>
                                            <option value="History And Government">History And Government</option>
                                            <option value="CRE">CRE</option>
                                            <option value="Geography">Geography</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="publisher" class="form-label">Publisher <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="publisher" id="publisher" class="form-control" required
                                            placeholder="Publisher:">
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
                                <h3 class="card-title">List of Text Books</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Add Text Book Title</a>
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
                                                        href="{{ url('textbooks/' . $book->title_id) }}">{{ $book->title }}</a>
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

@extends('layouts.admin', [
    'title' => 'Exercise Books',
    'class_open_books_management' => 'menu-open',
    'class_books_management' => 'active',
    'class_exercise_books' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exercise Books</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Exercise Books</li>
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
                                <h4 class="modal-title">Give Exercise Book</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('assign_exercise') }}" method="POST" class="row"
                                    id="student-form">
                                    {{ csrf_field() }}
                                    <input type="text" name="accessory_id" value="{{ $accessory_info->accessory_id }}"
                                        hidden>
                                    <div class="form-group col-lg-12">
                                        <label>Admission Number</label>
                                        <select name="adm" class="form-control select2bs4" style="width: 100%;">
                                            <option selected="selected">--- Select Student Admission---</option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->adm }}">
                                                    {{ $student->adm . ' ' . $student->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="type" class="form-label">Type: </label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="">---Select Type---</option>
                                            <option value="single">Single</option>
                                            <option value="ruled">Ruled</option>
                                        </select>
                                    </div>
                                    {{-- <div class="form-group col-lg-12">
          <label for="pages" class="form-label">Pages <span class="text-danger">*</span></label>
          <input type="number" name="pages" id="pages" class="form-control" required placeholder="Pages:">
      </div> --}}
                                    <div class="form-group col-lg-12">
                                        <label for="subject" class="form-label">Subject</label>
                                        <select name="subject" id="subject" class="form-control">
                                            <option value="">--- Select Subject ---</option>
                                            <option value="Mathematics">Mathematics</option>
                                            <option value="English">English</option>
                                            <option value="Kiswahili">Kiswahili</option>
                                            <option value="Chemistry">Chemistry</option>
                                            <option value="Biology">Biology</option>
                                            <option value="Physics">Physcis</option>
                                            <option value="Agriculture">Agriculture Studies</option>
                                            <option value="Business">Business Studies</option>
                                            <option value="History and Government">History and Government</option>
                                            <option value="CRE">CRE</option>
                                            <option value="Geography">Geography</option>
                                        </select>
                                    </div>

                                    {{-- <div class="form-group col-lg-12">
      <label for="date_given" class="form-label">Date Given <span class="text-danger">*</span></label>
      <input type="date" name="date_given" id="date_given" class="form-control" required >
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
                                <h3 class="card-title">List of Given Exercise Books</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Give Exercise Book</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Admission Number</th>
                                            <th>Full Name</th>
                                            <th>No. of Books</th>
                                            <th>Subjects</th>
                                            <th>...</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book => $subjects)
                                            <tr>
                                                <td>{{ $subjects[0]->adm }}</td>
                                                <td><a
                                                        href="{{ url('student_profile/' . $subjects[0]->adm) }}">{{ $subjects[0]->student_name }}</a>
                                                </td>
                                                <td>{{ $subjects->count() }}</td>
                                                <td>
                                                    <ol>
                                                        @foreach ($subjects as $item)
                                                            <li>{{ $item->subject }}</li>
                                                        @endforeach
                                                    </ol>
                                                </td>
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
                                            <th>Admission Number</th>
                                            <th>Full Name</th>
                                            <th>No. of Books</th>
                                            <th>Subjects</th>
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

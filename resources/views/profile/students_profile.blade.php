@extends('layouts.admin', [
    'title' => $student_info->name,
    'class_open_student_management' => 'menu-open',
    'class_student_management' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $student_info->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Students</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <section style="background-color: #eee;">
                <div class="container py-2">


                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <h5 class="my-3">{{ $student_info->name }}</h5>
                                    <p class="text-muted mb-1">{{ $student_info->adm }}</p>
                                    <p class="text-muted mb-4">{{ $student_info->class }}</p>
                                    <p>Number of Books Taken: <b>{{ $exercise_info->count() }}</b></p>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <form action="{{ route('update_student') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Full Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $student_info->name }}" placeholder="Student Name" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Admission</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="number" name="adm" id="adm" class="form-control"
                                                    placeholder="Admission Number" value="{{ $student_info->adm }}"
                                                    required>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">UPI Number</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" name="upi_number" id="upi_number" class="form-control"
                                                    placeholder="UPI Number" value="{{ $student_info->upi_number }}">
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Gender</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <select name="gender" id="gender" class="form-control" required>
                                                    <option value="{{ $student_info->gender }}">
                                                        {{ $student_info->gender }}</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Class:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <select name="class" id="class" class="form-control" required>
                                                    <option value="{{ $student_info->class }}">
                                                        {{ $student_info->class }}</option>
                                                    <option value="form1">Form 1</option>
                                                    <option value="form2">Form 2</option>
                                                    <option value="form3">Form 3</option>
                                                    <option value="form4">Form 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Parent Phone:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="tel" name="parent_phone" id="parent_phone"
                                                    class="form-control" placeholder="parent phone number"
                                                    value="{{ $student_info->parent_phone }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Year Joined:</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="number" name="year_joined" id="year_joined"
                                                    class="form-control" placeholder="parent phone number"
                                                    value="{{ $student_info->year_joined }}" required>
                                            </div>
                                        </div>

                                        <hr>
                                        <input type="submit" value="Update" class="btn btn-info">

                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-4 mb-md-0">
                                        <div class="card-body">
                                            <p class="mb-4"><span class="text-primary font-italic me-1">
                                                    <h2>Textbooks Assigned</h2>
                                                </span>
                                            </p>
                                            <ol>
                                                @foreach ($textbooks as $textbook)
                                                    <li class="mb-1" style="font-size: .77rem;">
                                                        {{ 'Title: ' . $textbook->title }}<br>
                                                        {{ 'No. ' . $textbook->book_number }}
                                                    </li>
                                                @endforeach

                                            </ol>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card mb-4 mb-md-0">
                                        <div class="card-body">
                                            <p class="mb-4"><span class="text-primary font-italic me-1">
                                                    <h4>Replaced Exercise Books</h4>
                                                </span></p>
                                            @foreach ($exercise_info as $exercise)
                                                <p class="mb-1" style="font-size: .77rem;">
                                                    {{ $exercise->subject }}</p>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
@endsection

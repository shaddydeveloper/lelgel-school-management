@extends('layouts.admin', [
    'title' => 'Settings',
    'class_open_system_configuration' => 'menu-open',
    'class_system_configuration' => 'active',
    'class_settings' => 'active',
])

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Settings Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Settings</li>
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

                            <div class="card-body row">
                                @if (!isset($school[0]))
                                    <form action="{{ route('school_settings') }}" method="POST" class="col-lg-6"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <fieldset class="form-group border p-3 m-2 row">
                                            <legend class="w-auto px-2">General Settings</legend>
                                            <div class="form-group col-lg-12">
                                                <label for="school_name" class="form-label">School Name</label>
                                                <input type="text" name="school_name" required id="school_name"
                                                    class="form-control" placeholder="School Name...">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label for="school_phone" class="form-label">School Phone Number</label>
                                                <input type="tel" name="school_phone" id="school_phone"
                                                    class="form-control" placeholder="School Phone Number">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label for="email" class="form-label">School Email</label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                    placeholder="School Email">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label for="logo" class="form-label">School Logo</label>
                                                <input type="file" name="logo" id="logo" class="form-control">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <input type="submit" value="Update School Settings" class="btn btn-info">
                                            </div>
                                        </fieldset>
                                    </form>
                                @else
                                    <form action="{{ route('school_settings') }}" method="POST" class="col-lg-6"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <fieldset class="form-group border p-3 m-2 row">
                                            <legend class="w-auto px-2">General Settings</legend>
                                            <div class="form-group col-lg-12">
                                                <label for="school_name" class="form-label">School Name</label>
                                                <input type="text" name="school_name" required
                                                    value="{{ $school[0]->name }}" id="school_name" class="form-control"
                                                    placeholder="School Name...">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label for="school_phone" class="form-label">School Phone Number</label>
                                                <input type="tel" name="school_phone" id="school_phone"
                                                    class="form-control" placeholder="School Phone Number"
                                                    value="{{ $school[0]->phone }}">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label for="email" class="form-label">School Email</label>
                                                <input type="email" name="email" id="email"
                                                    value="{{ $school[0]->email }}" class="form-control"
                                                    placeholder="School Email">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label for="logo" class="form-label">School Logo</label>
                                                <input type="file" name="logo" id="logo" class="form-control">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <input type="submit" value="Update School Settings" class="btn btn-info">
                                            </div>
                                        </fieldset>
                                    </form>
                                @endif
                                <form action="#" class="col-lg-6">
                                    <fieldset class="form-group border p-3 m-2 row">
                                        <legend class="w-auto px-2">School Classes Settings</legend>
                                        <div class="form-group col-lg-12">
                                            <label for="class_name" class="form-label">Classes Name</label>
                                            <input type="text" name="class_name" id="class_name" class="form-control"
                                                placeholder="Class Name">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <input type="checkbox" onchange="showSubStreams()" name="has_substreams"
                                                id="has_substreams" class="input-check">
                                            <label for="has_substreams" class="input-check-label">Has Sub Streams</label>
                                        </div>
                                        <div class="form-group col-lg-12 d-flex" id="substreams" style="display: none">
                                            <input type="text" name="substr" id="substr" class="form-control"
                                                placeholder="substream Name" style="display: none">
                                            <button id="add_sub" class="btn btn-info" style="display: none"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="class_teacher" class="form-label">Class Teacher</label>
                                            <select name="class_teacher" id="class_teacher" class="form-control">
                                                <option value="">--- Select Class Teacher ---</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <input type="submit" value="Update Classes" class="btn btn-info">
                                        </div>
                                    </fieldset>
                                </form>
                                <form action="{{ route('include_auto_generate_food') }}" method="POST" class="col-lg-4">
                                    @csrf
                                    <fieldset class="form-group border p-3 m-2 row">
                                        <legend class="w-auto px-2">
                                            Auto Generate Food Expenses
                                        </legend>
                                        <div class="form-group col-lg-12">
                                            <input type="checkbox" @if (isset($include_auto_generate[0])) checked @endif
                                                name="use_auto_generate_food" id="use_auto_generate_food"
                                                class="input-check">
                                            <label for="use_auto_generate_food" class="input-check-label">Use Auto
                                                generate
                                                food stuff expenses</label>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <input type="submit" value="Update" class="btn btn-info">
                                        </div>
                                    </fieldset>
                                </form>
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
@push('js')
    <script>
        function showSubStreams() {

            if ($('#has_substreams').is(':checked')) {
                document.getElementById('substr').style.display = 'block';
                document.getElementById('add_sub').style.display = 'block';
            } else {
                document.getElementById('substr').style.display = 'none';
                document.getElementById('add_sub').style.display = 'none';
            }

        }

        function existingData() {
            async function getData() {
                const response = await fetch(
                    "http://localhost/lelgel-school-management/public/api/exercise_books_data");
                const responseData = await response.json();

                console.log(responseData);
            }
            getData()
        }
    </script>
@endpush

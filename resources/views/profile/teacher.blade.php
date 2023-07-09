@extends('layouts.admin', [
    'title' => $teacher_info[0]->name,
    'class_open_teacher_management' => 'menu-open',
    'class_teacher' => 'active',
    'class_teacher_management' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $teacher_info[0]->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Teachers</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container rounded bg-white">
                <div class="row">

                    <div class="col-md-7 border-right">
                        <div class="p-3 py-5">

                            {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div> --}}
                            <div class="row mt-2">
                                <form action="" class="row">
                                    <input type="text" name="teacher_id" value="{{ $teacher_info[0]->teacher_id }}"
                                        hidden>

                                    <fieldset>
                                        <div class="col-md-12"><label class="labels">Full Name</label><input type="text"
                                                class="form-control" value="{{ $teacher_info[0]->name }}"></div>
                                        <div class="col-md-12"><label class="labels">ID Number</label><input type="text"
                                                class="form-control" value="{{ $teacher_info[0]->id_number }}"></div>
                                        <div class="col-md-12"><label class="labels">Phone Number</label><input
                                                type="text" class="form-control" value="{{ $teacher_info[0]->phone }}">
                                        </div>
                                    </fieldset>


                            </div>
                            </form>


                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save
                                    Profile</button></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                                    Experience</span><span class="border px-3 p-1 add-experience"><i
                                        class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                            <div class="col-md-12"><label class="labels">Experience in Designing</label><input
                                    type="text" class="form-control" placeholder="experience" value="">
                            </div> <br>
                            <div class="col-md-12"><label class="labels">Additional Details</label><input type="text"
                                    class="form-control" placeholder="additional details" value=""></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

@extends('layouts.admin', [
    'title' => $equipment_info->name,
    'class_open_store_management' => 'menu-open',
    'class_store_management' => 'active',
    'class_games_equipments' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $equipment_info->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Games Equipment</li>
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
                                    <h5 class="my-3">{{ $equipment_info->name }}</h5>
                                    <p class="text-muted mb-1">{{ $equipment_info->department }}</p>
                                    <p class="text-muted mb-4">{{ $equipment_info->quantity . ' Available' }}</p>
                                    <p>Date Registered: <b>{{ $equipment_info->date_registered }}</b></p>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-8">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-4 mb-md-0">
                                        <div class="card-body">
                                            <p class="mb-4"><span class="text-primary font-italic me-1">Students
                                                    Allocated</span></p>
                                            <ol>
                                                @foreach ($assigned_students as $item)
                                                    <li class="mb-1" style="font-size: .77rem;">
                                                        {{ $item->student_name }}</li>
                                                @endforeach
                                            </ol>


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

@extends('layouts.admin', [
    'title' => Auth::user()->name,
])
@section('content')
    <section class="content">
        <section style="background-color: #eee;">
            <div class="container py-2">


                <div class="row">

                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <form action="{{ route('update_user') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ Auth::user()->name }}" placeholder="Student Name" required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Email" value="{{ Auth::user()->email }}" required>
                                        </div>
                                    </div>
                                    <hr>


                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Change password:</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="New Password" value="">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Confirm password:</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="password" name="cpassword" id="cpassword" class="form-control"
                                                placeholder="Confirm New Password" value="">
                                        </div>
                                    </div>
                                    <hr>
                                    <input type="submit" value="Update" class="btn btn-info">

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        </div>
    @endsection

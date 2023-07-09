@extends('layouts.admin', [
    'title' => 'Fee Transactions',
    'class_open_fee_management' => 'menu-open',
    'class_fee_management' => 'active',
    'class_fee_transactions' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fee Transactions</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Fee Transactions</li>
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
                                <h4 class="modal-title">Make Payment</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <form action="{{ route('make_payment') }}" method="POST" class="row" id="student-form">
                                    {{ csrf_field() }}
                                    <div class="form-group col-lg-12">
                                        <label>Student Admission</label>
                                        <select name="adm" class="form-control select2bs4" style="width: 100%;">
                                            <option value="">--- Select Student Admission ---</option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->adm }}">
                                                    {{ $student->adm . ' ' . $student->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="mode_of_payment" class="form-label">Mode Of Payment</label>
                                        <select name="mode_of_payment" id="mode_of_payment" class="form-control" required>
                                            <option value="">--- Select Mode Of Payment ---</option>
                                            <option value="Mpesa">Mpesa</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Bank">Bank</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="referrence" class="form-label">Referrence <span><i>(Applies on Mpesa and
                                                    Bank)</i></span></label>
                                        <input type="text" name="referrence" id="referrence" class="form-control"
                                            placeholder="Referrence Code:">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="number" name="amount" id="amount" class="form-control"
                                            placeholder="Amount:" required>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="reciept_number" class="form-label">Receipt Number</label>
                                        <input type="text" name="receipt_number" id="receipt_number" class="form-control"
                                            required>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="date_payed" class="form-label">Date Payed <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="date_payed" id="date_payed" class="form-control"
                                            required>
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
                                <h3 class="card-title">List of Fee Payment Made</h3>
                                <a href="#" class="btn btn-info float-right" data-toggle="modal"
                                    data-target="#modal-overlay">Add Transaction</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ADM</th>
                                            <th>Name</th>
                                            <th>Mode Of Payment</th>
                                            <th>Referrence</th>
                                            <th>Amount</th>
                                            <th>Reciept Number</th>
                                            <th>Date Payed</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->adm }}</td>
                                                <td><a href="#">{{ $transaction->name }}</a></td>
                                                <td>{{ $transaction->mode_of_payment }}</td>
                                                <td>
                                                    @if ($transaction->referrence == '')
                                                        N/A
                                                    @else
                                                        {{ $transaction->referrence }}
                                                    @endif
                                                </td>
                                                <td>{{ $transaction->amount }}</td>
                                                <td>{{ $transaction->receipt_number }}</td>
                                                <td>{{ $transaction->date_payed }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ADM</th>
                                            <th>Name</th>
                                            <th>Mode Of Payment</th>
                                            <th>Referrence</th>
                                            <th>Amount</th>
                                            <th>Reciept Number</th>
                                            <th>Date Payed</th>
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

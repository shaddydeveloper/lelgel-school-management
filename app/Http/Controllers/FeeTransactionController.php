<?php

namespace App\Http\Controllers;

use App\Models\FeePayment;
use App\Models\FeeTransaction;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class FeeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $transactions = FeePayment::all();

        return view('pages.transactions',[
            'students' => $students,
            'transactions' => $transactions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student_name = Student::where('adm', $request->input('adm'))->get()[0]->name;

        $transaction = new FeeTransaction();
        $transaction->transaction_id = 'TR' . Str::random(10);
        $transaction->adm = $request->input('adm');
        $transaction->name = $student_name;
        $transaction->mode_of_payment =  $request->input('mode_of_payment');
        $transaction->ref = $request->input('ref');
        $transaction->amount = $request->input('amount');
        $transaction->date_payed = $request->input('date_payed');

        $transaction->save();


        Alert::success('Great !!', 'Successfully Recorded Fee Transaction');
         
        return redirect()->back();

        
    }

    /**
     * Display the specified resource.
     */
    public function show(FeeTransaction $feeTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeeTransaction $feeTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeeTransaction $feeTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeeTransaction $feeTransaction)
    {
        //
    }
}

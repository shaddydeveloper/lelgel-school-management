<?php

namespace App\Http\Controllers;

use App\Models\FeeBalance;
use App\Models\FeePayment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FeePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $receipt_existence = FeePayment::where('receipt_number', $request->input('receipt_number'))->get();
        if (isset($receipt_existence[0])) {
            Alert::error('Receipt Number Taken', 'Receipt Number Provided is Already Taken');
            return back();
        } else {  
            if ($request->input('referrence') == '') {
                $student_name = Student::where('adm', $request->input('adm'))->get()[0]->name;
        $payment = new FeePayment();
        $payment->payment_id = 'PAY' . Str::random(5) . time();
        $payment->adm = $request->input('adm');
        $payment->name = $student_name;
        $payment->mode_of_payment = $request->input('mode_of_payment');
        $payment->referrence = $request->input('referrence');
        $payment->amount = $request->input('amount');
        $payment->receipt_number = $request->input('receipt_number');
        $payment->date_payed = $request->input('date_payed');

        $payment->save();

        DB::update('update fee_balances set amount = amount - ? where adm = ?', [$request->input('amount'), $request->input('adm')]);
        DB::update('update fee_balances set last_payed = ? where adm = ?', [$request->input('date_payed'), $request->input('adm')]);

        Alert::success('Payment Done!!!', 'Payment Successfully Recorded');
        return back();
            } else {
                $referrence_duplication = FeePayment::where('referrence', $request->input('referrence'))->get();
                if (isset($referrence_duplication[0])) {
                    Alert::error('Referrence Duplications', 'Referrence provided already exists');
                    return back();
                } else {
                    $student_name = Student::where('adm', $request->input('adm'))->get()[0]->name;
        $payment = new FeePayment();
        $payment->payment_id = 'PAY' . Str::random(5) . time();
        $payment->adm = $request->input('adm');
        $payment->name = $student_name;
        $payment->mode_of_payment = $request->input('mode_of_payment');
        $payment->referrence = $request->input('referrence');
        $payment->amount = $request->input('amount');
        $payment->receipt_number = $request->input('receipt_number');
        $payment->date_payed = $request->input('date_payed');

        $payment->save();

        DB::update('update fee_balances set amount = amount - ? where adm = ?', [$request->input('amount'), $request->input('adm')]);
        DB::update('update fee_balances set last_payed = ? where adm = ?', [$request->input('date_payed'), $request->input('adm')]);

        Alert::success('Payment Done!!!', 'Payment Successfully Recorded');
        return back();
                }
                
            }
                  
        
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FeePayment $feePayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeePayment $feePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeePayment $feePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeePayment $feePayment)
    {
        //
    }
}

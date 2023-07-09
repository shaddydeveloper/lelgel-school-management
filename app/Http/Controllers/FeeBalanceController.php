<?php

namespace App\Http\Controllers;

use App\Models\FeeBalance;
use App\Models\Student;
use App\Models\Terms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FeeBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $terms = Terms::all()->toArray();
        if (!isset($terms[0])) {
            Alert::warning('Term Not Set!!!', 'Please make sure that You create terms');
            return redirect(route('terms'));
        } else {
            $current_term = Terms::where('current', true)->get();
            if (!isset($current_term[0])) {
                DB::update('update terms set current = ? where start_date < ? and end_date > ?', [true, Carbon::today(), Carbon::today()]);
                
            } else {
                
            
            
          
        $recorded_students = FeeBalance::all();
        $students = Student::all();
        $balances = FeeBalance::all();
        foreach ($students as $student) {
            $student_balance = FeeBalance::where('adm', $student->adm)->get();
            if (!isset($student_balance[0])) {
                $fee = new FeeBalance();
                $fee->adm = $student->adm;
                $fee->name = $student->name;
                $fee->amount = $current_term[0]->fee_amount;
                $fee->parent_number = $student->parent_phone;
                $fee->save();
            }
        };
        return view('pages.balance',[
            'balances' => $balances,
            'students' => $students
        ]);
    }
    }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FeeBalance $feeBalance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeeBalance $feeBalance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeeBalance $feeBalance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeeBalance $feeBalance)
    {
        //
    }
}
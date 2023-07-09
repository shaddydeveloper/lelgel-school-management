<?php

namespace App\Http\Controllers;

use App\Models\DailyExpense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class DailyExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stuffs = DailyExpense::selectRaw('name, quantity, unit_of_measure, total_price, day, date')
        ->orderBy('date', 'desc')->get()->groupBy('date');

        return view('pages.daily_expenses',[
            'stuffs' => $stuffs,
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
        $weekMap = [
            0 => 'SUNDAY',
            1 => 'MONDAY',
            2 => 'TUESDAY',
            3 => 'WEDNESDAY',
            4 => 'THURSDAY',
            5 => 'FRIDAY',
            6 => 'SARTURDAY',
        ];
        $expense = new DailyExpense();
        $expense->expense_id = 'EXP' .Str::random(5) . time();
        $expense->name = $request->input('name');
        $expense->quantity = $request->input('quantity');
        $expense->total_price = $request->input('price_per_item') * $request->input('quantity');
        $expense->unit_of_measure = $request->input('unit_of_measure');
        $expense->day = $weekMap[Carbon::parse($request->input('date'))->dayOfWeek];
        $expense->date = $request->input('date');

        $expense->save();
        Alert::toast('You Have successfully recorded The expense', 'success');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(DailyExpense $dailyExpense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyExpense $dailyExpense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DailyExpense $dailyExpense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyExpense $dailyExpense)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\FoodExpenditure;
use App\Models\FoodStuff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FoodExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stuffs = FoodStuff::where('available', true)->get();
        $expenditures = FoodExpenditure::selectRaw(
            'name, quantity, unit_of_measure, DATE(date_taken) as created_date'
        )->orderBy('created_date', 'asc')->get()->groupBy('created_date');

        return view('pages.food_usage',[
            'stuffs' => $stuffs,
            'expenditures' => $expenditures
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
        $current_quantity = FoodStuff::where('name', $request->input('name'))->get()[0]->quantity;
        if ($request->input('quantity')>$current_quantity) {
            Alert::warning('Warning', 'The Quantity you want To give out is greater than Available stock');
            return redirect()->back();
        } else {
            
        
        $unit_of_measure = FoodStuff::where('name', $request->input('name'))->get()[0]->unit_of_measure;
       $expenditure = new FoodExpenditure();
       $expenditure->expenditure_id = 'EXP' . Str::random(10);
       $expenditure->name = $request->input('name');
       $expenditure->quantity = $request->input('quantity');
       $expenditure->unit_of_measure = $unit_of_measure;
       $expenditure->date_taken = $request->input('date_taken');

       $expenditure->save();
       

       DB::update('update food_stuffs set quantity = quantity - ? where name = ?', [$request->input('quantity'), $request->input('name')]);
        $remaining_quantity = FoodStuff::where('name', $request->input('name'))->get()[0]->quantity;
       
        if ($remaining_quantity == 0) {
            DB::update('update food_stuffs set available = ? where name = ?', [false, $request->input('name')]);
            Alert::toast('Successfully Recorded Expenditure Transaction','success');
         
        return redirect()->back();
        } else {
            Alert::toast('Successfully Recorded Expenditure Transaction','success');
         
        return redirect()->back();
        }
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodExpenditure $foodExpenditure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FoodExpenditure $foodExpenditure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FoodExpenditure $foodExpenditure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FoodExpenditure $foodExpenditure)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\FoodStuff;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FoodStuffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stuffs = FoodStuff::all();

        return view('pages.food_staff',[
            'stuffs' => $stuffs
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
        $stuff = new FoodStuff();
        $stuff->stuff_id = 'STF' .Str::random(10);
        $stuff->name = $request->input('name');
        $stuff->quantity = $request->input('quantity');
        $stuff->unit_of_measure = $request->input('unit_of_measure');

        $stuff->save();



        Alert::success('Great !!', 'Successfully Added '.$request->input('name'));
         
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodStuff $foodStuff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FoodStuff $foodStuff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FoodStuff $foodStuff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        FoodStuff::where('stuff_id', $id)->delete();
        Alert::warning('Deleted!!!', 'You Have successfully deleted food Stuff');

        return back();
    }
}

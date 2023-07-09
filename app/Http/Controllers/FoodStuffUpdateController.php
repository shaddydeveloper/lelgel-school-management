<?php

namespace App\Http\Controllers;

use App\Models\FoodStuff;
use App\Models\FoodStuffUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FoodStuffUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $food_stuff = FoodStuff::where('stuff_id', $id)->get()[0];
        return view('pages.update_stuff',[
            'food_stuff' => $food_stuff
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
        $stuff = new FoodStuffUpdate();
        $stuff->stuff_id = $request->input('stuff_id');
        $stuff->name = $request->input('name');
        $stuff->quantity = $request->input('quantity');

        $stuff->save();

        DB::update('update food_stuffs set quantity = quantity + ? where stuff_id = ?', [$request->input('quantity'), $request->input('stuff_id')]);
        Alert::toast('Stock updated Succefully', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

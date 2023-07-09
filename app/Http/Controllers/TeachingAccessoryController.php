<?php

namespace App\Http\Controllers;

use App\Models\TeachingAccessory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TeachingAccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessories = TeachingAccessory::all();
        return view('pages.teaching_accessories',[
            'accessories' => $accessories
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
        $accessory = new TeachingAccessory();
        $accessory->accessory_id = 'TAC' . Str::random(10);
        $accessory->name = $request->input('name');
        $accessory->quantity = $request->input('quantity');
        $accessory->date_registered = $request->input('date_registered');

        $accessory->save();

        Alert::toast('Successfully Added Accessory', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(TeachingAccessory $teachingAccessory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeachingAccessory $teachingAccessory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeachingAccessory $teachingAccessory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeachingAccessory $teachingAccessory)
    {
        //
    }
}

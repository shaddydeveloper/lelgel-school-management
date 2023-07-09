<?php

namespace App\Http\Controllers;

use App\Models\StudentAccessory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class StudentAccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessories = StudentAccessory::all();
        return view('pages.students_accessories',[
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
        $accessory = new StudentAccessory();
        $accessory->accessory_id = 'STACC' . Str::random(10);
        $accessory->name = $request->input('name');
        $accessory->quantity = $request->input('quantity');
        $accessory->date_registered = $request->input('date_registered');

        $accessory->save();
        Alert::toast('Successfuly Added Student Accessory');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentAccessory $studentAccessory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentAccessory $studentAccessory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentAccessory $studentAccessory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAccessory $studentAccessory)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class SchoolController extends Controller
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
        $check_existence = School::all();

        if (!isset($check_existence[0])) {
            $school = new School();
            $school->school_id = 'SCH' . Str::random(5) . time();
            $school->name = $request->input('school_name');
            $school->phone = $request->input('school_phone');
            $school->email = $request->input('email');
            if ($request->hasFile('logo')) {
                $logo_name = 'Logo'. Str::random(5). '.' .$request->logo->extension();
                $logo_location = 'public/images/logo';
                $request->logo->storeAs($logo_location, $logo_name);
                $school->logo = $logo_name;
            }
           
            $school->save();
    
            Alert::toast('Successfully Created school Settings', 'success');
            return back();
        } else {
            School::where('school_id', $check_existence[0]->school_id)->update([
'school_id'=>$check_existence[0]->school_id,
'name'=>$request->input('school_name'),
'phone'=>$request->input('school_phone'),
'email'=>$request->input('email'),

            ]);
            Alert::toast('Successfully Updated school Settings', 'success');
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        //
    }
}
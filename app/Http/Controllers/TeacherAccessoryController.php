<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\TeacherAccessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherAccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        $assigned_accessories = TeacherAccessory::all();

        return view('pages.teachers_accessories',[
            'teachers' => $teachers,
            'assigned_accessories' => $assigned_accessories,
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
        $teacher_name = Teacher::where('teacher_id', $request->input('teacher_id'))->get()[0]->name;
        $accessory = new TeacherAccessory();
        $accessory->assigned_id = 'ASC' . Str::random(10);
        $accessory->accessory_id = $request->input('accessory_id');
        $accessory->accessory_name = $request->input('accessory_id');
        $accessory->teacher_id = $request->input('teacher_id');
        $accessory->teacher_name = $teacher_name;
        $accessory->date_assigned = $request->input('date_assigned');
        $accessory->quantity = $request->input('quantity');
        $accessory->assigned_by = Auth::user()->name;

        $accessory->save();

        Alert::success('Great !!', 'You\'ve Successfully Assigned Accessory');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherAccessory $teacherAccessory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherAccessory $teacherAccessory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeacherAccessory $teacherAccessory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherAccessory $teacherAccessory)
    {
        //
    }
}

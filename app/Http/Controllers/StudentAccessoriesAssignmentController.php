<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentAccessoriesAssignment;
use App\Models\StudentAccessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class StudentAccessoriesAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessories = StudentAccessory::where('available', true)->get();
        $students = Student::all();
        $givenAccessories = StudentAccessoriesAssignment::all();

        return view('pages.student_assignment',[
            'accessories' => $accessories,
            'students' => $students,
            'givenAccessories' => $givenAccessories,
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
        $available_quantity = StudentAccessory::where('name', $request->input('accessory_name'))->get()[0]->quantity;
        if ($available_quantity<$request->input('quantity')) {
            Alert::warning('Warning!!!', 'The quantity you want to give is greater than available quantity');
            return redirect()->back();
        } else {
            $student_name = Student::where('adm', $request->input('adm'))->get()[0]->name;
        $accessory = new StudentAccessoriesAssignment();
        $accessory->assignment_id = 'STASS' . Str::random(10);
        $accessory->accessory_name = $request->input('accessory_name');
        $accessory->adm = $request->input('adm');
        $accessory->student_name = $student_name;
        $accessory->quantity = $request->input('quantity');
        $accessory->date_given = $request->input('date_given');

        $accessory->save();

        
        
        DB::update('update student_accessories set quantity = quantity - ? where name = ?', [$request->input('quantity'), $request->input('accessory_name')]);

        $remaining_quantity = StudentAccessory::where('name', $request->input('accessory_name'))->get()[0]->quantity;

        if ($remaining_quantity == 0) {
            DB::update('update student_accessories set available = ? where name = ?', [false, $request->input('accessory_name')]);
            Alert::toast('Successfully Assigned Accessory', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Successfully Assigned Accessory', 'success');
            return redirect()->back();
        }
        

        
        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show(StudentAccessoriesAssignment $studentAccessoriesAssignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentAccessoriesAssignment $studentAccessoriesAssignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentAccessoriesAssignment $studentAccessoriesAssignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAccessoriesAssignment $studentAccessoriesAssignment)
    {
        //
    }
}

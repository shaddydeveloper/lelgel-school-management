<?php

namespace App\Http\Controllers;

use App\Models\AssignTextBook;
use App\Models\ExerciseBook;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $student = Student::where('student_id', $id)->get();
        if (isset($student[0])) {
            $student = $student[0];
        } else {
            $student = Student::where('adm', $id)->get()[0];
        }
        
        $exercise_info = ExerciseBook::where('adm', $student->adm)->get();
        $textbooks = AssignTextBook::where('adm', $student->adm)->get();
        
      return view('profile.students_profile',[
        'student_info' => $student,
        'exercise_info' => $exercise_info,
        'textbooks' => $textbooks,
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
        //
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

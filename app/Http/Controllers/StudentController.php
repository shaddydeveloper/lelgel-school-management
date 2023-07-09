<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Toaster;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('pages.students',[
            'students' => $students
        ]);
    }
    public function formOne()
    {
        $students = Student::where('class', 'form1')->get();
        return view('pages.form_one',[
            'students' => $students,
        ]);
    }
    public function formTwo()
    {
        $students = Student::where('class', 'form2')->get();

        return view('pages.form_two',[
            'students' => $students,
        ]);
    }
    public function formThree()
    {
        $students = Student::where('class', 'form3')->get();

        return view('pages.form_three',[
            'students' => $students,
        ]);
    }
    public function formFour()
    {
        $students = Student::where('class', 'form4')->get();

        return view('pages.form_four',[
            'students' => $students,
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
        $admission_repetition = Student::where('adm', $request->input('adm'))->get();
        $upi_repetition = Student::where('upi_number', $request->input('upi_number'))->get();
        if (isset($admission_repetition[0])) {
            Alert::error('Admission Repetition!!!', 'Admission Number ' . $request->input('adm') . ' Already Exist in the system');
            return redirect()->back();
        } else {
            if ($request->input('upi_number') == '') {
                $student = new Student();
        $student->student_id = 'STD' . Str::random(10);
        $student->adm = $request->input('adm');
        $student->upi_number = $request->input('upi_number');
        $student->name = $request->input('name');
        $student->gender = $request->input('gender');
        $student->class = $request->input('class');
        $student->parent_phone = $request->input('parent_phone');
        $student->year_joined = $request->input('year_joined');

        $student->save();

        Alert::toast('You\'ve Successfully Added Student','success');

        return redirect()->back();
            } else {
            
            
            if (isset($upi_repetition[0])) {
                Alert::error('UPI Repetition!!!', 'UPI Number ' . $request->input('upi_number') . ' Already Exist in the system');
                return redirect()->back();
            } else {
                
            
        $student = new Student();
        $student->student_id = 'STD' . Str::random(10);
        $student->adm = $request->input('adm');
        $student->upi_number = $request->input('upi_number');
        $student->name = $request->input('name');
        $student->gender = $request->input('gender');
        $student->class = $request->input('class');
        $student->parent_phone = $request->input('parent_phone');
        $student->year_joined = $request->input('year_joined');

        $student->save();

        Alert::toast('You\'ve Successfully Added Student','success');

        return redirect()->back();
            }
        
    }
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Student::where('adm', $request->input('adm'))->update([
           'adm' => $request->input('adm'),
           'upi_number' => $request->input('upi_number'),
           'name' => $request->input('name'),
           'gender' => $request->input('gender'),
           'class' => $request->input('class'),
           'parent_phone' => $request->input('parent_phone'),
           'year_joined' => $request->input('year_joined')
        ]);

        Alert::success('Update Successfull!!!', $request->input('name') . ' Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
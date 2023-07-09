<?php

namespace App\Http\Controllers;

use App\Models\ExerciseBook;
use App\Models\Student;
use App\Models\StudentAccessory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ExerciseBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessory_info = StudentAccessory::where('name', 'Exercise Books')->get();
        if (isset($accessory_info[0])) {
            $accessory_info = $accessory_info[0];
            $students = Student::all();
            $books = ExerciseBook::selectRaw(
                'adm, student_name, subject')
            ->orderBy('adm')->get()->groupBy('adm');
            return view('pages.exercise_book',[
                'books' => $books,
                'students' => $students,
                'accessory_info' => $accessory_info,
            ]);
        } else {
        
            Alert::warning('Add Exercise Books', 'Please Add exercise books to student accessory to use this feature');
            return redirect(route('student_accessories'));
    }
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
        $check_books_accessories = StudentAccessory::where('name', 'Exercise Books')->get();
        
        
        $student_name = Student::where('adm',$request->input('adm'))->get()[0]->name;
        $limit_check = ExerciseBook::where('adm', $request->input('adm'))->count();
        if ($limit_check >= 5) {
            Alert::error('Limit Reached !!!', $student_name . ' Has Taken More than 5 books');
            return redirect()->back();
        } else {
            $subject_repetition = ExerciseBook::where('adm', $request->input('adm'))->where('subject',$request->input('subject'))->get();
            if (isset($subject_repetition[0])) {
                Alert::error('Already Replaced!!!' , $request->input('subject') . ' Already taken by ' . $student_name);
                return redirect()->back();
            } else {
                $books_number = StudentAccessory::where('accessory_id', $request->input('accessory_id'))->get();
                
                if ($books_number[0]->quantity <= 0) {
                    Alert::error('Out of Books!!!!', 'The school is out of books');
                    return back();
                } else {
                   
                
                $book = new ExerciseBook();
            $book->exercise_id = 'EXE' . Str::random(10);
            $book->adm = $request->input('adm');
            $book->student_name = $student_name;
            $book->type = $request->input('type');
            $book->pages = 120;
            $book->subject = $request->input('subject');
            $book->date_given = Carbon::today();
    
            $book->save();

            StudentAccessory::where('accessory_id', $request->input('accessory_id'))->update([
                'quantity' => $books_number[0]->quantity - 1
            ]);
    
            Alert::success('Great !!', 'You\'ve Successfully Assigned Book');
             
            return redirect()->back();
                }
            }
            
            
        }
        
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ExerciseBook $exerciseBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExerciseBook $exerciseBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExerciseBook $exerciseBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExerciseBook $exerciseBook)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\AssignTextBook;
use App\Models\Student;
use App\Models\TextBook;
use App\Models\TextBookTitle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AssignTextBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $book_info = TextBookTitle::where('title_id', $id)->get()[0];
        $shared_books = AssignTextBook::where('shared', true)->get();
        $books = TextBook::where('title_id',$id)->get();
        $students = Student::all();
        $givenBooks =  AssignTextBook::where('title_id', $id)->selectRaw('book_id, book_number, title, adm, name')->orderBy('book_number')->get()->groupBy('book_number');
            // dd($givenBooks);
        return view('pages.assign_text_book',[
            'books' => $books,
            'students' => $students,
            'givenBooks' => $givenBooks,
            'shared_books' => $shared_books,
            'book_info' => $book_info,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = AssignTextBook::all();
       for ($i=0; $i < $books->count(); $i++) { 
        $book_id = TextBook::where('title',$books[$i]->title)->where('book_number', $books[$i]->book_number)->get()[0]->book_id;
        AssignTextBook::where('title',$books[$i]->title)->where('book_number', $books[$i]->book_number)->update([
            'book_id' => $book_id,
        ]);
       }
        Alert::success('Success!!!!', 'All Updated Successfully');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student_name = Student::where('adm', $request->input('adm'))->get()[0]->name;
        $book_subject = TextBook::where('book_id', $request->input('book_number'))->get()[0]->subject;
        $book_title = TextBook::where('book_id', $request->input('book_number'))->get()[0]->title;
        $book_title_id = TextBook::where('book_id', $request->input('book_number'))->get()[0]->title_id;
        $book_number = TextBook::where('book_id', $request->input('book_number'))->get()[0]->book_number;
        $book = new AssignTextBook();
        $book->assigned_id = 'ASTXTB' . Str::random(10);
        $book->book_id = $request->input('book_number');
        $book->title_id = $book_title_id;
        $book->title = $book_title;
        $book->book_number = $book_number;
        $book->subject = $book_subject;
        $book->adm = $request->input('adm');
        $book->name = $student_name;
        $book->shared = $request->input('is_shared') == 'true'? true : false;
        $book->date_given = Carbon::today();

        $book->save();
        if ($request->input('is_shared') == 'false') {
            DB::update('update text_books set status = ? where book_number = ?', ['assigned', $request->input('book_number')]);

        
            Alert::toast('Book ' . $book->book_number . ' ' . $book_subject . ' assigned to ' . $student_name, 'success');

        return redirect()->back();
        } else {
        
            Alert::toast('Book ' . $book->book_number . ' ' . $book_subject . ' assigned to ' . $student_name, 'success');
    
            return redirect()->back();
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $books = TextBookTitle::all();
        return view('pages.assign_textbook_titles',[
            'books' => $books,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssignTextBook $assignTextBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssignTextBook $assignTextBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignTextBook $assignTextBook)
    {
        //
    }
}

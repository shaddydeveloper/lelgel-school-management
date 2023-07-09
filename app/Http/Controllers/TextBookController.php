<?php

namespace App\Http\Controllers;

use App\Models\AssignTextBook;
use App\Models\TextBook;
use App\Models\TextBookTitle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TextBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $title_info = TextBookTitle::where('title_id', $id)->get()[0];

        $books = TextBook::where('title_id', $id)->get();
        return view('pages.text_books',[
            'books' => $books,
            'title_info' => $title_info,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function bookInfo($id){
        $book_info = TextBook::where('book_id', $id)->get();
        if (isset($book_info[0])) {
            $book_info = $book_info[0];
        } else {
        $book_info = AssignTextBook::where('assigned_id', $id)->get()[0];
        }
        
        $assigned_students = AssignTextBook::where('book_number', $book_info->book_number)->where('title_id', $book_info->title_id)->get();
    return view('profile.text_book',[
        'book_info' => $book_info,
        'assigned_students' => $assigned_students,
    ]);
        
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $repetition_check = TextBook::where('book_number', $request->input('book_number'))->where('title', $request->input('title'))->get();
        if (isset($repetition_check[0])) {
            Alert::error('Text Book Exist!', 'The book by number ' . $request->input('book_number') . ' Already Exists');
            return redirect()->back();
        } else {
            $book = new TextBook();
            $book->book_id = 'TXTBK' . Str::random(10);
            $book->title_id = $request->input('title_id');
            $book->title = $request->input('title');
            $book->book_number = $request->input('book_number');
            $book->subject = $request->input('subject');
            $book->date_registered = Carbon::today();
    
            $book->save();
            Alert::toast('You have Successfully Added New Book by number ' . $request->input('book_number'), 'success');
    
            return redirect()->back();
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(TextBook $textBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TextBook $textBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TextBook $textBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TextBook $textBook)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TextBookTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TextBookTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $textBooks = TextBookTitle::all();
        return view('pages.text_book_titles',[
            "books" => $textBooks,
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
        $book = new TextBookTitle();
        $book->title_id = 'TITLE' . time() .Str::random(5);
        $book->title = $request->input('title');
        $book->subject = $request->input('subject');
        $book->publisher = $request->input('publisher');
        $book->date_registered = $request->input('date_registered');

        $book->save();
        Alert::toast('Successfully Added Book By Title' . $request->input('title'), 'success');

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show(TextBookTitle $textBookTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TextBookTitle $textBookTitle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TextBookTitle $textBookTitle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TextBookTitle $textBookTitle)
    {
        //
    }
}

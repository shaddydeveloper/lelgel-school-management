<?php

namespace App\Http\Controllers;

use App\Models\AssignTextBook;
use App\Models\TextBook;
use App\Models\TextbookCollection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TextbookCollectionController extends Controller
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
    public function store($id)
    {
        $book_info = TextBook::where('book_id', $id)->get();
        $book = new TextbookCollection();
        $book->collection_id = 'COL' . Str::random(5) . time();
        $book->book_id = $book_info[0]->book_id;
        $book->title_id = $book_info[0]->title_id;
        $book->book_number = $book_info[0]->book_number;
        $book->title = $book_info[0]->title;
        $book->date_collected = Carbon::today();

        $book->save();

        AssignTextBook::where('book_id', $book_info[0]->book_id)->delete();

        Alert::success('Success!!!', 'Book collected Successfully');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(TextbookCollection $textbookCollection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TextbookCollection $textbookCollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TextbookCollection $textbookCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TextbookCollection $textbookCollection)
    {
        //
    }
}

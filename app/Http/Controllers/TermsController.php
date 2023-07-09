<?php

namespace App\Http\Controllers;

use App\Models\Terms;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $terms = Terms::all();
        return view('pages.terms',[
            'terms' => $terms
        ]);
    }
    public function termsApi()
    {
        $terms = Terms::all()->toArray();

        return array_reverse($terms);
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
        $term = new Terms();
        $term->term_id = 'TERM' . time() . Str::random(5);
        $term->name = $request->input('name');
        $term->start_date = $request->input('start_date');
        $term->end_date = $request->input('end_date');
        $term->fee_amount = $request->input('fee_amount');
        $term->save();

        Alert::toast('Term was successfully Added', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Terms $terms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Terms $terms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Terms $terms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Terms $terms)
    {
        //
    }
}

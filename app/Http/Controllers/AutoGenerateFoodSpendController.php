<?php

namespace App\Http\Controllers;

use App\Models\AutoGenerateFoodSpend;
use Illuminate\Http\Request;

class AutoGenerateFoodSpendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return view('pages.generate_daily_food');
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
    public function show(AutoGenerateFoodSpend $autoGenerateFoodSpend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AutoGenerateFoodSpend $autoGenerateFoodSpend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AutoGenerateFoodSpend $autoGenerateFoodSpend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AutoGenerateFoodSpend $autoGenerateFoodSpend)
    {
        //
    }
}
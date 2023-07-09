<?php

namespace App\Http\Controllers;

use App\Models\Apparatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\Toaster;

class ApparatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apparatus = Apparatus::all();

        return view('pages.apparatus',[
            'apparatus' => $apparatus,
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
        $apparator_repetition = Apparatus::where('name', $request->input('name'))->get();
        if (isset($apparator_repetition[0])) {
            Alert::error('Repetition!!!', $request->input('name') . ' Already Exists');
            return back();
        } else {
        
        $apparator = new Apparatus();
        $apparator->apparator_id = 'APP' . Str::random(10);
        $apparator->name = $request->input('name');
        $apparator->quantity = $request->input('quantity');
        $apparator->save();
        Alert::toast($request->input('name') . ' Successfully Added', 'success');
        return redirect()->back();
          
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Apparatus $apparatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apparatus $apparatus)
    {
        $apparator_info = Apparatus::where('apparator_id', $apparatus->apparator_id)->get()[0];

        return view('update.apparatus',[
            'apparator_info' => $apparator_info,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apparatus $apparatus)
    {
        Apparatus::where('apparator_id', $apparatus->apparator_id)->update($request->except('_token'));

        Alert::success('Success!!!', 'You have successfuly updated '. $request->input('name'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        
        Apparatus::where('apparator_id', $id)->delete();

        return redirect()->back();
    }
}

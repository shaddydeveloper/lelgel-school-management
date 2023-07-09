<?php

namespace App\Http\Controllers;

use App\Models\Chemicals;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ChemicalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chemicals = Chemicals::all();

        return view('pages.chemicals',[
            'chemicals' => $chemicals,
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
        $repetition_check = Chemicals::where('name', $request->input('name'))->get();

        if (isset($repetition_check[0])) {
            Alert::error('Repetition!!!!', 'The Chemical ' . $request->input('name') . ' Already Exists');
            return back();
        } else {
        
        $chemical = new Chemicals();
        $chemical->chemical_id = 'CHEM' . Str::random(10);
        $chemical->name = $request->input('name');
        $chemical->quantity = $request->input('quantity');
        $chemical->unit_of_measure = $request->input('unit_of_measure');

        $chemical->save();

        Alert::toast($request->input('name') . ' Successfully Added', 'success');

        return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Chemicals $chemicals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chemicals $chemical)
    {
        $chemical_info = Chemicals::where('chemical_id', $chemical->chemical_id)->get()[0];

        return view('update.chemicals',[
            'chemical_info' => $chemical_info,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chemicals $chemicals)
    {
        Chemicals::where('chemical_id', $chemicals->chemical_id)->update($request->except('_token'));

        Alert::success('Success!!!', 'You have successfuly updated '. $request->input('name'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Chemicals::where('chemical_id', $id)->delete();

        return redirect()->back();
    }
}

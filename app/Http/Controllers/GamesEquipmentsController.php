<?php

namespace App\Http\Controllers;

use App\Models\GamesEquipmentAllocation;
use App\Models\GamesEquipments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class GamesEquipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments = GamesEquipments::all();

        return view('pages.games_equipments',[
            'equipments' => $equipments,
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
        $equipment = new GamesEquipments();
        $equipment->equipment_id = 'GEQ' . Str::random(5) . time();
        $equipment->name = $request->input('name');
        $equipment->category = $request->input('category');
        $equipment->quantity = $request->input('quantity');
        $equipment->date_registered = Carbon::today();

        $equipment->save();

        Alert::toast('Equipment ' . $request->input('name') . ' Added Successfully', 'success');

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show($gamesEquipments)
    {

        $equipment_info = GamesEquipments::where('equipment_id', $gamesEquipments)->get()[0];
        $assigned_students = GamesEquipmentAllocation::where('equipment_id', $gamesEquipments);

        return view('profile.games_equipment',[
            'equipment_info' => $equipment_info,
            'assigned_students' => $assigned_students,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GamesEquipments $gamesEquipments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GamesEquipments $gamesEquipments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GamesEquipments $gamesEquipments)
    {
        //
    }
}

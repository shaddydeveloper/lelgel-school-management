<?php

namespace App\Http\Controllers;

use App\Models\GamesEquipmentAllocation;
use App\Models\GamesEquipments;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class GamesEquipmentAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $assigned_equpments = GamesEquipmentAllocation::all();
        $equipments = GamesEquipments::all();
        
        return view('pages.assign_games_equipments',[
            'assigned_equipments' => $assigned_equpments,
            'students' => $students,
            'equipments' => $equipments
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

        $student_name = Student::where('adm', $request->input('adm'))->get()[0];
        
        $equipment_name = GamesEquipments::where('equipment_id', $request->input('equipment_id'))->get()[0];
        $equipment = new GamesEquipmentAllocation();
        $equipment->assignment_id = 'ASGEQ' . Str::random(5) . time();
        $equipment->equipment_id = $request->input('equipment_id');
        $equipment->name = $equipment_name->name;
        $equipment->department = $equipment_name->department;
        $equipment->adm = $request->input('adm');
        $equipment->student_name = $student_name->name;
        $equipment->date_given = Carbon::today();

        $equipment->save();
        Alert::toast($equipment_name->name . ' Was assigned Successfully', 'success');
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(GamesEquipmentAllocation $gamesEquipmentAllocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GamesEquipmentAllocation $gamesEquipmentAllocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GamesEquipmentAllocation $gamesEquipmentAllocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GamesEquipmentAllocation $gamesEquipmentAllocation)
    {
        //
    }
}

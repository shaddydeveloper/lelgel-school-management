<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ExerciseBook;
use App\Models\Limit;
use App\Models\StudentAccessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ExercisebooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $books = ExerciseBook::selectRaw(
            'subject, exercise_id')
        ->orderBy('subject')->get()->groupBy('subject');
        
        return $books;
    }

    public function updateLimit($limit)
    {
        $exercise_accessory_id = StudentAccessory::where('name', 'Exercise Books')->get();
        if (!isset($exercise_accessory_id[0])) {
            Alert::warning('Please Add Exerice Books', 'You Should add exercice books in your accessories to set Limit');
            return redirect(route('student_accessories'));
        } else {
            $check_limit_existence = Limit::where('limit_id', $exercise_accessory_id[0]->accessory_id)->get();
            if (isset($check_limit_existence[0])) {
                Limit::where('limit_id', $check_limit_existence[0]->limit_id)->update(['limit' => $limit]);
            } else {
                $set_limit = new Limit();
                $set_limit->limit_id = $exercise_accessory_id[0]->accessory_id;
                $set_limit->item_name = "Exercise Books";
                $set_limit->limit = $limit;
                $set_limit->save();

                return response()->json([
                    'message' => 'Success'
                ]);
            }
            
        }
        
    }


    public function allLimits()
    {
        $limits = Limit::where('item_name', 'Exercise Books')->get();
        if (isset($limits[0])) {
            return response()->json($limits);
        } else {
            return response()->json([
                'message'=> 'Not Set'
            ]);
        }
        
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
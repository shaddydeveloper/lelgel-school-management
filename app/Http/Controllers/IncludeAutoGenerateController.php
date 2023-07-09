<?php

namespace App\Http\Controllers;

use App\Models\IncludeAutogenerateDailyFood;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class IncludeAutoGenerateController extends Controller
{
    public function includeAutogenerate(Request $request)
    {
        $check_existence = IncludeAutogenerateDailyFood::all();
        if (!isset($check_existence[0])) {
            $include_auto_generate = new IncludeAutogenerateDailyFood();
        $include_auto_generate->include_id = 'INC' .Str::random(5) . time();
        $include_auto_generate->save();

        Alert::toast('Food Autogenerate Included Successfully please visit auto generate settings to modify', 'success');
        return back();
        } else {
            IncludeAutogenerateDailyFood::where('include_id', $check_existence[0]->include_id)->delete();

            Alert::toast('Auto Generate Daily food Disabled successfuly', 'warning');
            return back();
        }
        
    }
}
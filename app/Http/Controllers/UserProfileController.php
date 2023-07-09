<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile.user');
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
       if ($request->input('password') == '') {
        User::where('email', Auth::user()->email)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);
        Alert::success('Success!!!', 'You have successfully updated your profile');
        return back();
       } else {
        if ($request->input('password') == $request->input('cpassword')) {
            User::where('email', Auth::user()->email)->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
            Alert::success('Success!!!', 'You have successfully updated your profile');
            return back(); 
        } else {
            Alert::error('Password Does Not Match', 'Make Sure that your password Match The confirm Password');
            return back();
        }
        
       }
       
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

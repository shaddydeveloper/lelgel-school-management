<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notifications::all()->toArray();
        return $notifications;
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
        dd($request->title);
    $notification = new Notifications();
    $notification->notification_id = 'NTF' . time() . Str::random(5);
    $notification->title = $request->title;
    $notification->item_id = $request->item_id;
    $notification->notification_number = $request->notification_number;
    $notification->repeat = $request->repeat;

    $notification->save();
    Alert::success('Success!!!', 'Successfully Added Notification');

    return [
        'success' => "success"
    ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Notifications $notifications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notifications $notifications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notifications $notifications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notifications $notifications)
    {
        //
    }
}

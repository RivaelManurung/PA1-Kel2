<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function kontak()
    {
        return view('kontak.kontak');
    }
    
    public function notif(Request $request)
{
    $notificationId = $request->input('id');

    // Find the notification by ID and mark it as read
    $notification = Peminjaman::findOrFail($notificationId);
    $notification->pemberitahuan = null;
    $notification->save();

    // Reduce the notification count for the user
    $totalNotifications = Peminjaman::where('user_id', auth()->user()->id)
        ->where('pemberitahuan', '!=', null)
        ->count();
    $totalNotifications--;

    // Return the updated notification count
    return response()->json(['count' => $totalNotifications]);
}
}

<?php

namespace App\Http\Controllers;

use App\Models\KartuKuning;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user == null) {
            return view('home.index4', [
                'user' => $user,
            ]);
        } else {
            $group_id = Auth::user()->group_id;
            $user_id = Auth::user()->id;

            if ($group_id == 1) {
                $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
                $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
                $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
                $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
                $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
                $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();
                return view('home.admin.index', [
                    'user' => $user,
                    'group_id' => $group_id,
                    'notifications' => $notifications,
                    'jumlah_notif' => $jumlah_notif,
                    'notif_ak1' => $notif_ak1,
                    'notif_rekom' => $notif_rekom,
                    'notif_lamaran' => $notif_lamaran,
                    'notif_pelatihan' => $notif_pelatihan,
                ]);
            } else {
                $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
                $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();
                return view('home.index4', [
                    'user' => $user,
                    'group_id' => $group_id,
                    'notifications' => $notifications
                ]);
            }
        }
    }
}

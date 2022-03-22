<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();

        return view('user.index', [
            'users' => $users,
            'user' => $user,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
        ]);
    }

    public function create()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();
        return view('user.create', [
            'user' => $user,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->group_id = $request->group_id;
            $user->status = 1;

            $user->created_at = $request->created_at;
            $user->updated_at = $request->updated_at;

            $user->save();

            DB::commit();
            return response()->json([
                'message' => 'Data User berhasil disimpan.',
                'code' => 200,
                'error' => false,
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Internal error',
                'code' => 500,
                'error' => true,
                'errors' => $e . '',
            ], 500);
        }
    }
}

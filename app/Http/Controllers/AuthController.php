<?php

namespace App\Http\Controllers;

use App\Models\KartuKuning;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;


class AuthController extends Controller
{
    public function showFormLogin()
    {
        // if (Auth::check()) {
        //     $access = Auth::user()->access;
        // }
        return view('auth.login');
    }

    public function showFormLoginAdmin()
    {
        // if (Auth::check()) {
        //     $access = Auth::user()->access;
        // }
        return view('auth.login_admin');
    }

    public function showFormRegister()
    {
        // if (Auth::check()) {
        //     $access = Auth::user()->access;
        // }
        $users = User::all();


        // return $user;
        return view('auth.register', [
            'users' => $users
        ]);
    }

    public function authenticate(Request $request)
    {
        $nik = $request->nik;
        $password = $request->password;

        // dd($username, $password);
        Auth::attempt(['nik' => $nik, 'password' => $password]);


        if (Auth::check()) {

            $request->session()->regenerate();

            $kartu_kuning = KartuKuning::where('nik', $nik)->first();
            if ($kartu_kuning == null) {
                return redirect('kartu_kuning');
            } else {
                return redirect()->route('home');
            }
        }
        FacadesSession::flash('error', 'NIK atau password salah');
        return redirect()->route('login');
    }

    public function authenticate_admin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        // return dd($username);


        // dd($username, $password);
        Auth::attempt(['username' => $username, 'password' => $password]);


        if (Auth::check()) {

            $request->session()->regenerate();
            // $group = Auth::user()->groups->name;

            // return $group;
            // if ($group == "Super Admin") {
            //     return redirect()->route('dashboard1');
            // } else {
            //     return redirect()->route('dashboard2');
            // }

            return redirect()->route('home');
            // $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
            // $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
            // $user = Auth::user();

            // return view('home.admin.index', [
            //     'notifications' => $notifications,
            //     'jumlah_notif' => $jumlah_notif,
            //     'user' => $user
            // ]);
        }
        FacadesSession::flash('error', 'Username atau password salah');
        return redirect()->route('login_admin');
    }

    public function store(Request $request)
    {
        $new_nik = $request->nik;
        $users = User::where('nik', $new_nik)->first();

        if ($users == null) {
            $user = new User();
            $user->nik = $request->nik;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->email = $request->email;
            $user->group_id = 2;
            $user->status = 1;
            try {
                $user->save();
                return redirect()->route('login');
            } catch (Exception $e) {
                return response()->json([
                    'message' => 'Internal error',
                    'code' => 500,
                    'error' => true,
                    'errors' => $e,
                ], 500);
            }
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect('homepage');
    }
}

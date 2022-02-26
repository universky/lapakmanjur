<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

    public function authenticate(Request $request)
    {
        $username = $request->username;
        $password = $request->password;


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
        }
        FacadesSession::flash('error', 'Username atau password salah');
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}

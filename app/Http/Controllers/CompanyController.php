<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Notification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
        $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
        $user = Auth::user();

        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
        $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
        $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();
        return view('perusahaan.index', [
            'companies' => $companies,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
            'user' => $user,
            'notif_ak1' => $notif_ak1,
            'notif_rekom' => $notif_rekom,
            'notif_lamaran' => $notif_lamaran,
            'notif_pelatihan' => $notif_pelatihan,
        ]);
    }

    public function create()
    {
        $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
        $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
        $user = Auth::user();

        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
        $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
        $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();
        return view('perusahaan.create', [
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
            'user' => $user,
            'notif_ak1' => $notif_ak1,
            'notif_rekom' => $notif_rekom,
            'notif_lamaran' => $notif_lamaran,
            'notif_pelatihan' => $notif_pelatihan,
        ]);
    }

    public function store(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->industri = $request->industri;
        $company->lokasi = $request->lokasi;
        $company->website = $request->website;
        $company->phone = $request->phone;
        $company->alamat = $request->alamat;
        $company->created_at = $request->created_at;
        $company->updated_at = $request->updated_at;


        try {
            $company->save();
            return response()->json([
                'message' => 'Data Perusahaan berhasil disimpan.',
                'code' => 200,
                'error' => false,
                'data' => $company,
            ]);
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

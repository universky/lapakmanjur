<?php

namespace App\Http\Controllers;

use App\Models\Lpk;
use App\Models\Notification;
use App\Models\Pelatihan;
use App\Models\Training;
use Exception;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LPKController extends Controller
{
    public function index()
    {
        $lpks = Lpk::all();
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 1)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 1)->count();

        return view('lpk.admin.index', [
            'lpks' => $lpks,
            'user' => $user,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif
        ]);
    }

    public function daftar()
    {
        $user = Auth::user();
        if ($user != null) {
            $user_id = Auth::user()->id;
            $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 1)->get();
            $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 1)->count();
            return view('lpk.daftar', [
                'user' => $user,
                'notifications' => $notifications,
                'jumlah_notif' => $jumlah_notif
            ]);
        } else {
            return view('lpk.daftar', [
                'user' => $user,
            ]);
        }
    }

    public function halaman_cetak(Request $request)
    {
        $no_max_pelatihan = Pelatihan::max('id');
        $no_registrasi = "LP" . date("dmY") . sprintf("%07d", $no_max_pelatihan + 1);

        $pelatihan = new Pelatihan();
        $pelatihan->no_registrasi = $no_registrasi;
        $pelatihan->nama_lpk = $request->nama_lpk;
        $pelatihan->nama_pelatihan = $request->nama_pelatihan;
        $pelatihan->phone = $request->phone;
        $pelatihan->email = $request->email;
        $pelatihan->alamat = $request->alamat;
        $pelatihan->date = date('Y-m-d');
        $pelatihan->status = "Pending";
        $pelatihan->created_at = $request->created_at;
        $pelatihan->updated_at = $request->updated_at;
        $pelatihan->save();

        $pelatihans = Pelatihan::find($pelatihan->id);
        $url = "/lpk/daftar/cetak_pendaftaran/" . $pelatihan->id;


        // return $url;

        return view('lpk.halaman_cetak', [
            'pelatihans' => $pelatihans,
            'url' => $url
        ]);
    }

    // public function store(Request $request)
    // {
    //     $no_max_pelatihan = Pelatihan::max('id');
    //     $no_registrasi = "LP" . date("dmY") . sprintf("%07d", $no_max_pelatihan + 1);

    //     $pelatihan = new Pelatihan();
    //     $pelatihan->no_registrasi = $no_registrasi;
    //     $pelatihan->nama_lpk = $request->nama_lpk;
    //     $pelatihan->nama_pelatihan = $request->nama_pelatihan;
    //     $pelatihan->phone = $request->phone;
    //     $pelatihan->email = $request->email;
    //     $pelatihan->alamat = $request->alamat;
    //     $pelatihan->date = date('Y-m-d');
    //     $pelatihan->status = "Pending";
    //     $pelatihan->created_at = $request->created_at;
    //     $pelatihan->updated_at = $request->updated_at;

    //     $pelatihan->save();

    //     return redirect('/lpk/daftar/halaman_cetak/' . $pelatihan->id);
    // }

    public function cetak_pendaftaran($id)
    {
        $pelatihans = Pelatihan::find($id);
        $no_registrasi = $pelatihans['no_registrasi'];

        // return $pelatihans;

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 'format' =>
            [150, 101],
            'margin_right' => '5',
            'margin_left' => '5',
            'margin_bottom' => '10',
            'margin_top' => '6',
        ]);
        $data = view('lpk.cetak', [
            'pelatihans' => $pelatihans,
        ]);

        $mpdf->WriteHTML($data);
        $file_name = 'Bukti Registrasi Pelatihan - No. ' . $no_registrasi . '.pdf';
        $mpdf->WriteHTML($data);
        $mpdf->Output($file_name, 'I');
        exit();
    }

    public function detail($id)
    {
        $lpk = Lpk::find($id);
        $trainings = Training::where('lpk_id', $id)->get();

        // return $tranings;

        return view('lpk.admin.detail', [
            'lpk' => $lpk,
            'trainings' => $trainings
        ]);
    }

    public function approval(Request $request, $id)
    {
        $lpk = Lpk::find($id);

        $lpk->status = "Approved";
        $lpk->alasan = $request->alasan;

        try {
            $lpk->save();
            return response()->json([
                'message' => 'LPK berhasil Disetujui',
                'code' => 200,
                'error' => false,
                'data' => $lpk,
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

    public function reject(Request $request, $id)
    {
        $lpk = Lpk::find($id);

        $lpk->status = "Rejected";
        $lpk->alasan = $request->alasan;

        try {
            $lpk->save();
            return response()->json([
                'message' => 'LPK berhasil ditolak',
                'code' => 200,
                'error' => false,
                'data' => $lpk,
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

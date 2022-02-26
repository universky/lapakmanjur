<?php

namespace App\Http\Controllers;

use App\Models\KartuKuning;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KartuKuningController extends Controller
{
    public function index()
    {
        $user_group = Auth::user()->group_id;

        if ($user_group == 1) {
            $kartu_kunings = KartuKuning::all();

            return view('kartu_kuning.admin.index', [
                'kartu_kunings' => $kartu_kunings
            ]);
        } else {
            $user_id = Auth::user()->id;
            $kartu_kuning = KartuKuning::where('user_id', $user_id)->first();
            if ($kartu_kuning == null) {
                return view('kartu_kuning.create');
            } else {
                return view('kartu_kuning.index', [
                    'kartu_kuning' => $kartu_kuning
                ]);
            }
        }
    }

    public function create()
    {
        return view('kartu_kuning.create');
    }

    public function edit($id)
    {
        $kartu_kuning = KartuKuning::find($id);

        return view('kartu_kuning.edit', [
            'kartu_kuning' => $kartu_kuning
        ]);
    }

    public function store(Request $request)
    {

        $number = substr($request->nik, 0, 4);
        $no_max_kk = KartuKuning::max('id');
        $no_pencari_kerja = $number . sprintf("%07d", $no_max_kk + 1) . date("dmy");
        $masa_berlaku = date('Y-m-d', strtotime('+1 year', strtotime($request->date)));
        $user = Auth::user()->id;

        $kartu_kuning = new KartuKuning();
        $kartu_kuning->nik = $request->nik;
        $kartu_kuning->no_pencari_kerja = $no_pencari_kerja;
        $kartu_kuning->user_id = $user;
        $kartu_kuning->nama_lengkap = $request->nama_lengkap;
        $kartu_kuning->tgl_lahir = $request->tgl_lahir;
        $kartu_kuning->jenis_kelamin = $request->jenis_kelamin;
        $kartu_kuning->status_perkawinan = $request->status_perkawinan;
        $kartu_kuning->agama = $request->agama;
        $kartu_kuning->provinsi = $request->provinsi;
        $kartu_kuning->kota = $request->kota;
        $kartu_kuning->kode_pos = $request->kode_pos;
        $kartu_kuning->alamat = $request->alamat;
        $kartu_kuning->masa_berlaku = $masa_berlaku;
        $kartu_kuning->date = $request->date;
        $kartu_kuning->status = "Menunggu Persetujuan";
        $kartu_kuning->created_at = $request->created_at;
        $kartu_kuning->updated_at = $request->updated_at;


        try {
            $kartu_kuning->save();
            return response()->json([
                'message' => 'Data has been saved',
                'code' => 200,
                'error' => false,
                'data' => $kartu_kuning,
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

    public function update(Request $request, $id)
    {

        $masa_berlaku = date('Y-m-d', strtotime('+1 year', strtotime($request->date)));

        $kartu_kuning = KartuKuning::find($id);
        $kartu_kuning->nik = $request->nik;
        $kartu_kuning->nama_lengkap = $request->nama_lengkap;
        $kartu_kuning->tgl_lahir = $request->tgl_lahir;
        $kartu_kuning->jenis_kelamin = $request->jenis_kelamin;
        $kartu_kuning->status_perkawinan = $request->status_perkawinan;
        $kartu_kuning->agama = $request->agama;
        $kartu_kuning->provinsi = $request->provinsi;
        $kartu_kuning->kota = $request->kota;
        $kartu_kuning->kode_pos = $request->kode_pos;
        $kartu_kuning->alamat = $request->alamat;
        $kartu_kuning->masa_berlaku = $masa_berlaku;
        $kartu_kuning->date = $request->date;
        $kartu_kuning->status = "Menunggu Persetujuan";
        $kartu_kuning->created_at = $request->created_at;
        $kartu_kuning->updated_at = $request->updated_at;


        try {
            $kartu_kuning->save();
            return response()->json([
                'message' => 'Data has been saved',
                'code' => 200,
                'error' => false,
                'data' => $kartu_kuning,
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

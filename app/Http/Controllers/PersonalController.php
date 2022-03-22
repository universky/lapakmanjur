<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\JobExpectation;
use App\Models\KartuKuning;
use App\Models\Notification;
use App\Models\Personal;
use App\Models\UploadFile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Caster\RdKafkaCaster;

class PersonalController extends Controller
{
    public function create()
    {
        $nik = Auth()->user()->nik;
        $email = Auth()->user()->email;
        $name = Auth()->user()->name;
        $date = date('Y-m-d');
        $date2 = date('Y-m-d', strtotime('-18 year', strtotime($date)));

        // return $date2;

        $number = substr($nik, 0, 4);
        $no_max_kk = KartuKuning::max('id');
        $no_pencari_kerja = $number . sprintf("%07d", $no_max_kk + 1) . date("dmy");

        $user = Auth::user();
        $user_id = $user['id'];
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();

        return view('kartu_kuning.personal.create', [
            'nik' => $nik,
            'email' => $email,
            'name' => $name,
            'no_pencari_kerja' => $no_pencari_kerja,
            'user' => $user,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
            'date2' => $date2
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $date = date("Y-m-d");
            $masa_berlaku = date('Y-m-d', strtotime('+1 year', strtotime($date)));
            $user = Auth::user()->id;

            $kartu_kuning = new KartuKuning();
            $kartu_kuning->no_pencari_kerja = $request->no_pencari_kerja;
            $kartu_kuning->nik = $request->nik;
            $kartu_kuning->user_id = $user;
            $kartu_kuning->masa_berlaku = $masa_berlaku;
            $kartu_kuning->date = $date;
            $kartu_kuning->status = "Not Registered Yet";
            $kartu_kuning->created_at = $request->created_at;
            $kartu_kuning->updated_at = $request->updated_at;

            $kartu_kuning->save();

            $personal = new Personal();
            $personal->kartu_kuning_id = $kartu_kuning->id;
            $personal->nama_lengkap = $request->nama_lengkap;
            $personal->jenis_kelamin = $request->jenis_kelamin;
            $personal->kewarganegaraan = $request->kewarganegaraan;
            $personal->kondisi_fisik = $request->kondisi_fisik;
            $personal->tempat_lahir = $request->tempat_lahir;
            $personal->tgl_lahir = $request->tgl_lahir;
            $personal->status_perkawinan = $request->status_perkawinan;
            $personal->agama = $request->agama;
            $personal->alamat = $request->alamat;
            $personal->rt = $request->rt;
            $personal->rw = $request->rw;
            $personal->kode_pos = $request->kode_pos;
            $personal->no_hp = $request->no_hp;
            $personal->tinggi_badan = $request->tinggi_badan;
            $personal->berat_badan = $request->berat_badan;
            $personal->created_at = $request->created_at;
            $personal->updated_at = $request->updated_at;

            $personal->save();

            $upload_files = new UploadFile();
            $upload_files->kartu_kuning_id = $kartu_kuning->id;

            $foto = $request->file('foto');
            $nama_foto =  $kartu_kuning->nik . "_" . $request->foto_name;
            $foto->move('files/foto', $nama_foto);
            $upload_files->foto = $nama_foto;

            $ijazah = $request->file('ijazah');
            $nama_ijazah =  $kartu_kuning->nik . "_" . $request->ijazah_name;
            $ijazah->move('files/ijazah', $nama_ijazah);
            $upload_files->ijazah = $nama_ijazah;

            $upload_files->created_at = $request->created_at;
            $upload_files->updated_at = $request->updated_at;

            $upload_files->save();

            DB::commit();
            return response()->json([
                'message' => 'Data has been saved',
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

    public function edit($id)
    {
        $personal = Personal::find($id);
        $user = Auth::user();
        $user_id = $user['id'];
        $kartu_kuning_id = $personal['kartu_kuning_id'];
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();

        $upload_files = UploadFile::where('kartu_kuning_id', $kartu_kuning_id)->first();
        $date = date('Y-m-d');
        $date2 = date('Y-m-d', strtotime('-18 year', strtotime($date)));

        return view('kartu_kuning.personal.edit', [
            'personal' => $personal,
            'user' => $user,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
            'upload_files' => $upload_files,
            'date2' => $date2
        ]);
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        DB::beginTransaction();

        try {

            $personal = Personal::find($id);
            $personal->nama_lengkap = $request->nama_lengkap;
            $personal->jenis_kelamin = $request->jenis_kelamin;
            $personal->kewarganegaraan = $request->kewarganegaraan;
            $personal->kondisi_fisik = $request->kondisi_fisik;
            $personal->tempat_lahir = $request->tempat_lahir;
            $personal->tgl_lahir = $request->tgl_lahir;
            $personal->status_perkawinan = $request->status_perkawinan;
            $personal->agama = $request->agama;
            $personal->alamat = $request->alamat;
            $personal->rt = $request->rt;
            $personal->rw = $request->rw;
            $personal->kode_pos = $request->kode_pos;
            $personal->no_hp = $request->no_hp;
            $personal->tinggi_badan = $request->tinggi_badan;
            $personal->berat_badan = $request->berat_badan;
            $personal->created_at = $request->created_at;
            $personal->updated_at = $request->updated_at;

            $personal->save();

            $kartu_kuning_id = $personal['kartu_kuning_id'];
            $kartu_kuning = KartuKuning::find($kartu_kuning_id);
            if ($request->foto != null) {
                $old_foto = UploadFile::where('kartu_kuning_id', $kartu_kuning_id);
                $old_foto->delete();

                $upload_files = new UploadFile();
                $upload_files->kartu_kuning_id = $kartu_kuning_id;

                $foto = $request->file('foto');
                $nama_foto =  $kartu_kuning['nik'] . "_" . $request->foto_name;
                $foto->move('files/foto', $nama_foto);
                $upload_files->foto = $nama_foto;

                $ijazah = $request->file('ijazah');
                $nama_ijazah =  $kartu_kuning['nik'] . "_" . $request->ijazah_name;
                $ijazah->move('files/ijazah', $nama_ijazah);
                $upload_files->ijazah = $nama_ijazah;

                $upload_files->created_at = $request->created_at;
                $upload_files->updated_at = $request->updated_at;

                $upload_files->save();
            }



            DB::commit();
            return response()->json([
                'message' => 'Data Personal AK1 berhasil diperbaharui.',
                'code' => 200,
                'error' => false,
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Internal error',
                'code' => 500,
                'error' => true,
                'errors' => $e . 'asfafa',
            ], 500);
        }
    }
}

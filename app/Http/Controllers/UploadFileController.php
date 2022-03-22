<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\UploadFile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UploadFileController extends Controller
{
    public function create($id)
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();
        return view('kartu_kuning.upload_file.create', [
            'id' => $id,
            'user' => $user,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $nik = Auth::user()->nik;

            $upload_files = new UploadFile();
            $upload_files->kartu_kuning_id = $request->id;

            $foto = $request->file('foto');
            $nama_foto =  $nik . "_" . $request->foto_name;
            $foto->move('files/foto', $nama_foto);
            $upload_files->foto = $nama_foto;

            $ijazah = $request->file('ijazah');
            $nama_ijazah =  $nik . "_" . $request->ijazah_name;
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
        $upload_files = UploadFile::where('kartu_kuning_id', $id)->first();
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();

        return view('kartu_kuning.upload_file.edit', [
            'upload_files' => $upload_files,
            'id' => $id,
            'user' => $user,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
        ]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {

            $old_file = UploadFile::find($id);
            $old_file->delete();

            $nik = Auth::user()->nik;

            $upload_files = new UploadFile();
            $upload_files->kartu_kuning_id = $request->id;

            $foto = $request->file('foto');
            $nama_foto =  $nik . "_" . $request->foto_name;
            $foto->move('files/foto', $nama_foto);
            $upload_files->foto = $nama_foto;

            $ijazah = $request->file('ijazah');
            $nama_ijazah =  $nik . "_" . $request->ijazah_name;
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
}

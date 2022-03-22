<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\KartuKuning;
use App\Models\Notification;
use App\Models\Personal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Caster\RdKafkaCaster;

class EducationController extends Controller
{
    public function create($id)
    {
        $user = Auth::user();
        $user_id = $user['id'];
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();
        return view('kartu_kuning.education.create', [
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

            $education = new Education();
            $education->kartu_kuning_id = $request->id;
            $education->pendidikan = $request->pendidikan;
            $education->jurusan = $request->jurusan;
            $education->nama_institusi = $request->nama_institusi;
            $education->tahun_lulus = $request->tahun_lulus;
            $education->lama_pendidikan = $request->lama_pendidikan;
            $education->ipk = $request->ipk;

            $education->created_at = $request->created_at;
            $education->updated_at = $request->updated_at;

            $education->save();

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
                'errors' => $e . 'ffdf',
            ], 500);
        }
    }

    public function edit($id)
    {
        $education = Education::find($id);
        $user = Auth::user();
        $user_id = $user['id'];
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();
        return view('kartu_kuning.education.edit', [
            'education' => $education,
            'user' => $user,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
        ]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {

            $education = Education::find($id);
            $education->pendidikan = $request->pendidikan;
            $education->jurusan = $request->jurusan;
            $education->nama_institusi = $request->nama_institusi;
            $education->tahun_lulus = $request->tahun_lulus;
            $education->lama_pendidikan = $request->lama_pendidikan;
            $education->ipk = $request->ipk;

            $education->created_at = $request->created_at;
            $education->updated_at = $request->updated_at;

            $education->save();

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

<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Notification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExperienceController extends Controller
{
    public function create($id)
    {
        $experiences = Experience::where('kartu_kuning_id', $id)->get();
        $user = Auth::user();
        $user_id = $user['id'];
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();
        return view('kartu_kuning.experience.create', [
            'id' => $id,
            'experieces' => $experiences,
            'user' => $user,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
        ]);
    }

    public function store(Request $request)
    {
        //   return $request->all();
        DB::beginTransaction();


        try {
            $experienceList = $request->experienceList;

            foreach ($experienceList as $experience) {
                $experiences = new Experience();
                $experiences->kartu_kuning_id = $request->id;
                $experiences->nama_perusahaan = $experience['nama_perusahaan'];
                $experiences->jabatan = $experience['jabatan'];
                $experiences->deskripsi_pekerjaan = $experience['deskripsi_pekerjaan'];
                $experiences->lama_kerja = $experience['lama_kerja'];
                $experiences->gaji = $experience['gaji'];

                $experiences->created_at = $request->created_at;
                $experiences->updated_at = $request->updated_at;

                $experiences->save();
            }

            DB::commit();
            return response()->json([
                'message' => 'Data Pengalaman berhasil disimpan.',
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
        $experiences = Experience::where('kartu_kuning_id', $id)->get();
        $user = Auth::user();
        $user_id = $user['id'];
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();

        return view('kartu_kuning.experience.edit', [
            'experiences' => $experiences,
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

            $experiences = Experience::where('kartu_kuning_id', $id);
            $experiences->delete();

            $experienceList = $request->experienceList;

            foreach ($experienceList as $experience) {
                $experiences = new Experience();
                $experiences->kartu_kuning_id = $request->id;
                $experiences->nama_perusahaan = $experience['nama_perusahaan'];
                $experiences->jabatan = $experience['jabatan'];
                $experiences->deskripsi_pekerjaan = $experience['deskripsi_pekerjaan'];
                $experiences->lama_kerja = $experience['lama_kerja'];
                $experiences->gaji = $experience['gaji'];

                $experiences->created_at = $request->created_at;
                $experiences->updated_at = $request->updated_at;

                $experiences->save();
            }

            DB::commit();
            return response()->json([
                'message' => 'Data Pengalaman berhasil diperbaharui',
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

<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\SkillLanguage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SkillLanguageController extends Controller
{
    public function create($id)
    {
        $user = Auth::user();
        $user_id = $user['id'];
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();
        return view('kartu_kuning.skill_language.create', [
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

            $skill_language = new SkillLanguage();
            $skill_language->kartu_kuning_id = $request->id;
            $skill_language->keterampilan = $request->keterampilan;
            $skill_language->bahasa = $request->bahasa;

            $skill_language->created_at = $request->created_at;
            $skill_language->updated_at = $request->updated_at;

            $skill_language->save();

            DB::commit();
            return response()->json([
                'message' => 'Data Keterampilan dan Bahasa berhasil disimpan.',
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
        $skill_language = SkillLanguage::find($id);
        $user = Auth::user();
        $user_id = $user['id'];
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();

        return view('kartu_kuning.skill_language.edit', [
            'skill_language' => $skill_language,
            'user' => $user,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
        ]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {

            $skill_language = SkillLanguage::find($id);
            $skill_language->keterampilan = $request->keterampilan;
            $skill_language->bahasa = $request->bahasa;

            $skill_language->created_at = $request->created_at;
            $skill_language->updated_at = $request->updated_at;

            $skill_language->save();

            DB::commit();
            return response()->json([
                'message' => 'Data Keterampilan dan Bahasa berhasil diperbaharui.',
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

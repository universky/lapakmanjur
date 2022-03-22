<?php

namespace App\Http\Controllers;

use App\Models\JobExpectation;
use App\Models\Notification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobExpectationController extends Controller
{
    public function create($id)
    {
        $user = Auth::user();
        $user_id = $user['id'];
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();
        return view('kartu_kuning.job_expectation.create', [
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
            $data1 = str_replace(".", "", $request->min_gaji_harapan);
            $data2 = str_replace(",", ".", $data1);

            $job_expectation = new JobExpectation();
            $job_expectation->kartu_kuning_id = $request->id;
            $job_expectation->penempatan = $request->penempatan;
            $job_expectation->provinsi_harapan = $request->provinsi_harapan;
            $job_expectation->kab_harapan = $request->kab_harapan;
            $job_expectation->min_gaji_harapan = $data2;

            $job_expectation->created_at = $request->created_at;
            $job_expectation->updated_at = $request->updated_at;

            $job_expectation->save();

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
        $job_expectation = JobExpectation::find($id);
        $user = Auth::user();
        $user_id = $user['id'];
        $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
        $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();

        return view('kartu_kuning.job_expectation.edit', [
            'job_expectation' => $job_expectation,
            'user' => $user,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
        ]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $data1 = str_replace(".", "", $request->min_gaji_harapan);
            $data2 = str_replace(",", ".", $data1);

            $job_expectation = JobExpectation::find($id);
            $job_expectation->penempatan = $request->penempatan;
            $job_expectation->provinsi_harapan = $request->provinsi_harapan;
            $job_expectation->kab_harapan = $request->kab_harapan;
            $job_expectation->min_gaji_harapan = $data2;

            $job_expectation->created_at = $request->created_at;
            $job_expectation->updated_at = $request->updated_at;

            $job_expectation->save();

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

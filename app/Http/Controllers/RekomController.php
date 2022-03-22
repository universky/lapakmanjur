<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\JobExpectation;
use App\Models\KartuKuning;
use App\Models\Notification;
use App\Models\Personal;
use App\Models\RekomPassport;
use App\Models\SkillLanguage;
use App\Models\UploadFile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RekomController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $kartu_kuning = KartuKuning::where('user_id', $user_id)->first();
        if ($kartu_kuning == null) {
            return redirect('kartu_kuning');
        } else {
            $kartu_kuning_id = $kartu_kuning['id'];
            $personal = Personal::where('kartu_kuning_id', $kartu_kuning_id)->first();
            $user = Auth::user();
            $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
            $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();



            $rekom_passport = RekomPassport::where('kartu_kuning_id', $kartu_kuning_id)->first();

            // return $rekom_passport;
            return view('rekom.index', [
                'kartu_kuning' => $kartu_kuning,
                'personal' => $personal,
                'rekom_passport' => $rekom_passport,
                'user' => $user,
                'notifications' => $notifications,
                'jumlah_notif' => $jumlah_notif,
            ]);
        }
    }

    public function index_admin()
    {
        $rekom_passports = RekomPassport::with('kartu_kunings')->get();
        $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
        $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();

        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
        $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
        $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();

        // return $notif_ak1;
        $user = Auth::user();
        return view('rekom.admin.index', [
            'rekom_passports' => $rekom_passports,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
            'user' => $user,
            'notif_ak1' => $notif_ak1,
            'notif_rekom' => $notif_rekom,
            'notif_lamaran' => $notif_lamaran,
            'notif_pelatihan' => $notif_pelatihan,
        ]);
    }

    public function detail($id)
    {
        $rekom_passport = RekomPassport::find($id);
        $kartu_kuning_id = $rekom_passport['kartu_kuning_id'];
        $kartu_kuning = KartuKuning::where('id', $kartu_kuning_id)->first();
        $experiences = Experience::where('kartu_kuning_id', $kartu_kuning_id)->get();
        $personal = Personal::where('kartu_kuning_id', $kartu_kuning_id)->first();
        $education = Education::where('kartu_kuning_id', $kartu_kuning_id)->first();
        $job_expectation = JobExpectation::where('kartu_kuning_id', $kartu_kuning_id)->first();
        $skill_language = SkillLanguage::where('kartu_kuning_id', $kartu_kuning_id)->first();
        $upload_files = UploadFile::where('kartu_kuning_id', $kartu_kuning_id)->first();

        $user = Auth::user();
        $user_id = Auth::user()->id;
        $notifications = Notification::where('status', 0)->where('group_id', 1)->get();
        $jumlah_notif = Notification::where('status', 0)->where('group_id', 1)->count();

        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
        $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
        $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();

        // return $jumlah_notif;

        return view('rekom.admin.detail', [
            'rekom_passport' => $rekom_passport,
            'kartu_kuning' => $kartu_kuning,
            'experiences' => $experiences,
            'personal' => $personal,
            'education' => $education,
            'job_expectation' => $job_expectation,
            'skill_language' => $skill_language,
            'upload_files' => $upload_files,
            'id' => $id,
            'user' => $user,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
            'notif_ak1' => $notif_ak1,
            'notif_rekom' => $notif_rekom,
            'notif_lamaran' => $notif_lamaran,
            'notif_pelatihan' => $notif_pelatihan,
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;
            $kartu_kuning = KartuKuning::where('user_id', $user_id)->first();
            $kartu_kuning_id = $kartu_kuning['id'];
            $no_max_rp = RekomPassport::max('id');
            $no_registrasi = "RP" . date("dmY") . sprintf("%07d", $no_max_rp + 1);
            $date = date('Y-m-d');

            $rekom_passport = new RekomPassport();
            $rekom_passport->kartu_kuning_id = $kartu_kuning_id;
            $rekom_passport->no_registrasi = $no_registrasi;
            $rekom_passport->tujuan_negara = $request->tujuan_negara;
            $rekom_passport->skema_penempatan = $request->skema_penempatan;
            $rekom_passport->status = "Pending";
            $rekom_passport->date = $date;

            $rekom_passport->created_at = $request->created_at;
            $rekom_passport->updated_at = $request->updated_at;

            $rekom_passport->save();

            $notification = new Notification();
            $notification->user_id = $user_id;
            $notification->title = "Pengajuan Rekom Passport - " . $rekom_passport['no_registrasi'];
            $notification->notif_type = "Rekom Passport";
            $notification->icon = "info";
            $notification->status = 0;
            $notification->datetime = date("Y-m-d h:i:s");
            $notification->group_id = 1;

            $notification->save();

            DB::commit();
            return response()->json([
                'message' => 'Rekom Passport Berhasil diajukan.',
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

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;

            $rekom_passport = RekomPassport::find($id);
            $rekom_passport->tujuan_negara = $request->tujuan_negara;
            $rekom_passport->skema_penempatan = $request->skema_penempatan;
            $rekom_passport->status = "Pending";
            $rekom_passport->date = date('Y-m-d');

            $rekom_passport->created_at = $request->created_at;
            $rekom_passport->updated_at = $request->updated_at;

            $rekom_passport->save();

            $notification = new Notification();
            $notification->user_id = $user_id;
            $notification->title = "Pengajuan Rekom Passport - " . $rekom_passport['no_registrasi'];
            $notification->notif_type = "Rekom Passport";
            $notification->icon = "info";
            $notification->status = 0;
            $notification->datetime = date("Y-m-d h:i:s");
            $notification->group_id = 1;

            $notification->save();

            DB::commit();
            return response()->json([
                'message' => 'Rekom Passport Berhasil diajukan.',
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

    public function approval(Request $request, $id)
    {

        DB::beginTransaction();

        try {

            $rekom_passport = RekomPassport::find($id);

            $rekom_passport->status = "Approved";
            $rekom_passport->alasan = $request->alasan;

            $rekom_passport->save();

            $kartu_kuning_id = $rekom_passport['kartu_kuning_id'];
            $kartu_kuning = KartuKuning::find($kartu_kuning_id);
            $user_id = $kartu_kuning['user_id'];

            $notification = new Notification();
            $notification->user_id = $user_id;
            $notification->title = "Pengajuan Rekom Passport Disetujui!";
            $notification->notif_type = "Rekom Passport";
            $notification->message = $rekom_passport->alasan;
            $notification->icon = "info";
            $notification->status = 0;
            $notification->datetime = date("Y-m-d h:i:s");
            $notification->group_id = 2;
            $notification->save();

            DB::commit();
            return response()->json([
                'message' => 'Rekom Passport Berhasil Disetujui',
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

    public function reject(Request $request, $id)
    {
        DB::beginTransaction();

        try {

            $rekom_passport = RekomPassport::find($id);

            $rekom_passport->status = "Rejected";
            $rekom_passport->alasan = $request->alasan;

            $rekom_passport->save();

            $kartu_kuning_id = $rekom_passport['kartu_kuning_id'];
            $kartu_kuning = KartuKuning::find($kartu_kuning_id);
            $user_id = $kartu_kuning['user_id'];

            $notification = new Notification();
            $notification->user_id = $user_id;
            $notification->title = "Pengajuan Rekom Passport Ditolak!";
            $notification->notif_type = "Rekom Passport";
            $notification->message = $rekom_passport->alasan;
            $notification->icon = "report";
            $notification->status = 0;
            $notification->datetime = date("Y-m-d h:i:s");
            $notification->group_id = 2;
            $notification->save();

            DB::commit();
            return response()->json([
                'message' => 'Rekom Passport Berhasil Ditolak',
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

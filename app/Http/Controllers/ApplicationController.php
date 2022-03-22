<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Job;
use App\Models\JobExpectation;
use App\Models\KartuKuning;
use App\Models\Notification;
use App\Models\Personal;
use App\Models\SkillLanguage;
use App\Models\UploadFile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $applications = Application::with(['kartu_kunings', 'jobs'])->get();
        $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
        $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();

        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
        $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
        $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();

        return view('applicant.index', [
            'applications' => $applications,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
            'user' => $user,
            'notif_ak1' => $notif_ak1,
            'notif_rekom' => $notif_rekom,
            'notif_lamaran' => $notif_lamaran,
            'notif_pelatihan' => $notif_pelatihan,
        ]);
    }

    public function apply($id)
    {

        $user = Auth::user();
        if ($user == null) {
            return view('auth.login');
        } else {
            $user_id = Auth::user()->id;
            $kartu_kuning = KartuKuning::where('user_id', $user_id)->first();

            $nik = Auth()->user()->nik;
            $email = Auth()->user()->email;

            $number = substr($nik, 0, 4);
            $no_max_kk = KartuKuning::max('id');
            $no_pencari_kerja = $number . sprintf("%07d", $no_max_kk + 1) . date("dmy");

            if ($kartu_kuning == null) {
                return view('kartu_kuning.create', [
                    'nik' => $nik,
                    'email' => $email,
                    'no_pencari_kerja' => $no_pencari_kerja
                ]);
            } else {
                $kartu_kuning_id = $kartu_kuning['id'];
                $date = date("Y-m-d");

                $application = new Application();
                $application->kartu_kuning_id = $kartu_kuning_id;
                $application->job_id = $id;
                $application->date = $date;
                $application->status = "Pending";

                try {
                    $application->save();
                    return redirect('loker/detail/' . $id);
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
    }

    public function detail($id)
    {
        $application = Application::find($id);
        $job_id = $application['job_id'];
        $job = Job::with('companies')->where('id', $job_id)->first();
        $kartu_kuning_id = $application['kartu_kuning_id'];
        $kartu_kuning = KartuKuning::where('id', $kartu_kuning_id)->first();
        $experiences = Experience::where('kartu_kuning_id', $kartu_kuning_id)->get();
        $personal = Personal::where('kartu_kuning_id', $kartu_kuning_id)->first();
        $education = Education::where('kartu_kuning_id', $kartu_kuning_id)->first();
        $job_expectation = JobExpectation::where('kartu_kuning_id', $kartu_kuning_id)->first();
        $skill_language = SkillLanguage::where('kartu_kuning_id', $kartu_kuning_id)->first();
        $upload_files = UploadFile::where('kartu_kuning_id', $kartu_kuning_id)->first();

        $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
        $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
        $user = Auth::user();

        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
        $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
        $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();

        // return $application;

        return view('applicant.detail', [
            'application' => $application,
            'kartu_kuning' => $kartu_kuning,
            'experiences' => $experiences,
            'personal' => $personal,
            'education' => $education,
            'job_expectation' => $job_expectation,
            'skill_language' => $skill_language,
            'upload_files' => $upload_files,
            'job' => $job,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
            'user' => $user,
            'notif_ak1' => $notif_ak1,
            'notif_rekom' => $notif_rekom,
            'notif_lamaran' => $notif_lamaran,
            'notif_pelatihan' => $notif_pelatihan,
        ]);
    }

    public function detail_pelamar($id)
    {
        $application = Application::find($id);
        $kartu_kuning_id = $application['kartu_kuning_id'];
        $kartu_kuning = KartuKuning::where('id', $kartu_kuning_id)->first();
        $experiences = Experience::where('kartu_kuning_id', $kartu_kuning_id)->get();
        $personal = Personal::where('kartu_kuning_id', $kartu_kuning_id)->first();
        $education = Education::where('kartu_kuning_id', $kartu_kuning_id)->first();
        $job_expectation = JobExpectation::where('kartu_kuning_id', $kartu_kuning_id)->first();
        $skill_language = SkillLanguage::where('kartu_kuning_id', $kartu_kuning_id)->first();
        $upload_files = UploadFile::where('kartu_kuning_id', $kartu_kuning_id)->first();

        $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
        $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
        $user = Auth::user();

        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
        $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
        $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();

        return view('applicant.detail_pelamar', [
            'application' => $application,
            'kartu_kuning' => $kartu_kuning,
            'experiences' => $experiences,
            'personal' => $personal,
            'education' => $education,
            'job_expectation' => $job_expectation,
            'skill_language' => $skill_language,
            'upload_files' => $upload_files,
            'id' => $id,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
            'user' => $user,
            'notif_ak1' => $notif_ak1,
            'notif_rekom' => $notif_rekom,
            'notif_lamaran' => $notif_lamaran,
            'notif_pelatihan' => $notif_pelatihan,
        ]);
    }

    public function approval(Request $request, $id)
    {
        $application = Application::find($id);

        $application->status = "Approved";
        $application->alasan = $request->alasan;

        try {
            $application->save();
            return response()->json([
                'message' => 'Data has been saved',
                'code' => 200,
                'error' => false,
                'data' => $application,
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
        $application = Application::find($id);

        $application->status = "Rejected";
        $application->alasan = $request->alasan;

        try {
            $application->save();
            return response()->json([
                'message' => 'Data has been saved',
                'code' => 200,
                'error' => false,
                'data' => $application,
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

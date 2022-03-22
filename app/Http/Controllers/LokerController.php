<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use App\Models\Job;
use App\Models\KartuKuning;
use App\Models\Notification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokerController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $req_search = $request->query('search');


        // return $a;


        //Check Box
        $sort_by = $request->query('sort_by');
        $kategori = $request->query('kategori');
        $pengalaman = $request->query('pengalaman');
        $gaji = $request->query('gaji');

        if ($sort_by == null) {
            $sort_by = "Terbaru";
        }

        if ($kategori == null) {
            $kategori = 0;
        }

        if ($pengalaman == null) {
            $pengalaman = "0 - 1 Tahun";
        }

        if ($gaji == null) {
            $gaji = "1 - 3 juta";
        }

        if ($gaji == "1 - 3 juta") {
            $min_gaji = 1000000;
            $max_gaji = 3000000;
        }
        // return $kategori;

        // return $lastPage;
        if ($user == null) {


            if ($req_search != null) {
                $jobs = Job::query()
                    ->where('nama_pekerjaan', 'LIKE', "%{$req_search}%")
                    ->where('kategori', $kategori)
                    ->where('pengalaman', $pengalaman)
                    ->paginate(8);
            } else {
                if ($kategori != 0) {
                    $jobs = Job::with('companies')->where('kategori', $kategori)->where('pengalaman', $pengalaman)->paginate(8);
                    // return $jobs;
                } else {
                    $jobs = Job::with('companies')->where('pengalaman', $pengalaman)->paginate(8);
                    // return $min_gaji;
                }
            }

            $currentPage = $jobs->currentPage();
            $currentUrl = "/loker?page=" . $currentPage;
            $prevPage = $jobs->previousPageUrl();
            $nextPage = $jobs->nextPageUrl();
            $next2Page = $currentPage + 2;
            $prev2Page = $currentPage - 2;
            $next2Url = "/loker?page=" . $next2Page;
            $prev2Url = "/loker?page=" . $prev2Page;
            $lastPage = $jobs->lastPage();
            $totalItem = $jobs->total();

            // return $totalItem;
            return view('loker.index', [
                'jobs' => $jobs,
                'currentPage' => $currentPage,
                'prevPage' => $prevPage,
                'nextPage' => $nextPage,
                'currentUrl' => $currentUrl,
                'next2Url' => $next2Url,
                'prev2Url' => $prev2Url,
                'lastPage' => $lastPage,
                'sort_by' => $sort_by,
                'kategori' => $kategori,
                'pengalaman' => $pengalaman,
                'gaji' => $gaji,
                'req_search' => $req_search,
                'totalItem' => $totalItem
            ]);
        } else {
            $user_group = Auth::user()->group_id;
            if ($user_group == 1) {
                $jobs = Job::with('companies')->get();
                $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
                $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
                $user = Auth::user();

                $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
                $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
                $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
                $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();

                // return $jobs;
                return view('loker.admin.index', [
                    'jobs' => $jobs,
                    'notifications' => $notifications,
                    'jumlah_notif' => $jumlah_notif,
                    'user' => $user,
                    'notif_ak1' => $notif_ak1,
                    'notif_rekom' => $notif_rekom,
                    'notif_lamaran' => $notif_lamaran,
                    'notif_pelatihan' => $notif_pelatihan,
                ]);
            } else {

                if ($req_search != null) {
                    $jobs = Job::query()
                        ->where('nama_pekerjaan', 'LIKE', "%{$req_search}%")
                        ->where('kategori', $kategori)
                        ->where('pengalaman', $pengalaman)
                        ->paginate(8);
                } else {
                    if ($kategori != 0) {
                        $jobs = Job::with('companies')->where('kategori', $kategori)->where('pengalaman', $pengalaman)->paginate(8);
                        // return $jobs;
                    } else {
                        $jobs = Job::with('companies')->where('pengalaman', $pengalaman)->paginate(8);
                    }
                }

                $currentPage = $jobs->currentPage();
                $currentUrl = "/loker?page=" . $currentPage;
                $prevPage = $jobs->previousPageUrl();
                $nextPage = $jobs->nextPageUrl();
                $next2Page = $currentPage + 2;
                $prev2Page = $currentPage - 2;
                $next2Url = "/loker?page=" . $next2Page;
                $prev2Url = "/loker?page=" . $prev2Page;
                $lastPage = $jobs->lastPage();
                $totalItem = $jobs->total();

                // return $totalItem;

                $user = Auth::user();
                $user_id = $user['id'];
                $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
                $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();
                return view('loker.index', [
                    'jobs' => $jobs,
                    'currentPage' => $currentPage,
                    'prevPage' => $prevPage,
                    'nextPage' => $nextPage,
                    'currentUrl' => $currentUrl,
                    'next2Url' => $next2Url,
                    'prev2Url' => $prev2Url,
                    'lastPage' => $lastPage,
                    'user' => $user,
                    'notifications' => $notifications,
                    'jumlah_notif' => $jumlah_notif,
                    'sort_by' => $sort_by,
                    'kategori' => $kategori,
                    'pengalaman' => $pengalaman,
                    'gaji' => $gaji,
                    'req_search' => $req_search,
                    'totalItem' => $totalItem
                ]);
            }
        }
    }

    public function detail($id)
    {
        $user = Auth::user();
        $jobs = Job::where('id', $id)->with('companies')->first();
        if ($user == null) {
            $applied = 2;
            return view('loker.detail', [
                'jobs' => $jobs,
                'applied' => $applied
            ]);
        } else {
            $group = Auth::user()->group_id;

            if ($group == 1) {
                $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
                $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
                $user = Auth::user();

                $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
                $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
                $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
                $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();
                return view('loker.admin.detail', [
                    'jobs' => $jobs,
                    'group' => $group,
                    'notifications' => $notifications,
                    'jumlah_notif' => $jumlah_notif,
                    'user' => $user,
                    'notif_ak1' => $notif_ak1,
                    'notif_rekom' => $notif_rekom,
                    'notif_lamaran' => $notif_lamaran,
                    'notif_pelatihan' => $notif_pelatihan,
                ]);
            } else {
                $job_id = $jobs['id'];
                $user_id = Auth::user()->id;
                $kartu_kuning = KartuKuning::where('user_id', $user_id)->first();
                $kartu_kuning_id = $kartu_kuning['id'];

                // return $job_id;

                $cek_apply = Application::where('kartu_kuning_id', $kartu_kuning_id)->where('job_id', $job_id)->first();

                if ($cek_apply == null) {
                    $applied = "2";
                } else {
                    $applied = "1";
                }

                $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
                $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
                $user = Auth::user();
                // return $cek_apply;

                return view('loker.detail', [
                    'jobs' => $jobs,
                    'applied' => $applied,
                    'notifications' => $notifications,
                    'jumlah_notif' => $jumlah_notif,
                    'user' => $user,
                ]);
            }
        }
    }

    public function create()
    {
        $companies = Company::all();
        $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
        $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
        $user = Auth::user();

        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
        $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
        $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();

        // return $companies;
        return view('loker.admin.create', [
            'companies' => $companies,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
            'user' => $user,
            'notif_ak1' => $notif_ak1,
            'notif_rekom' => $notif_rekom,
            'notif_lamaran' => $notif_lamaran,
            'notif_pelatihan' => $notif_pelatihan,
        ]);
    }

    public function edit($id)
    {
        $job = Job::find($id);
        $companies = Company::all();
        $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
        $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
        $user = Auth::user();

        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
        $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
        $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();
        return view('loker.admin.edit', [
            'job' => $job,
            'companies' => $companies,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
            'user' => $user,
            'notif_ak1' => $notif_ak1,
            'notif_rekom' => $notif_rekom,
            'notif_lamaran' => $notif_lamaran,
            'notif_pelatihan' => $notif_pelatihan,
        ]);
    }

    public function store(Request $request)
    {
        $data1 = str_replace(".", "", $request->gaji1);
        $data2 = str_replace(".", "", $request->gaji2);
        $gaji1 = str_replace(",", ".", $data1);
        $gaji2 = str_replace(",", ".", $data2);

        $job = new Job();
        $job->company_id = $request->company_id;
        $job->kategori = $request->kategori;
        $job->nama_pekerjaan = $request->nama_pekerjaan;
        $job->gaji1 = $gaji1;
        $job->gaji2 = $gaji2;
        $job->jam_kerja = $request->jam_kerja;
        $job->pengalaman = $request->pengalaman;
        $job->kemampuan_wajib = $request->kemampuan_wajib;
        $job->kemampuan_tambahan = $request->kemampuan_tambahan;
        $job->deskripsi = $request->deskripsi;
        $job->tgl_buat = $request->tgl_buat;
        $job->batas_tgl = $request->batas_tgl;
        $job->created_at = $request->created_at;
        $job->updated_at = $request->updated_at;


        try {
            $job->save();
            return response()->json([
                'message' => 'Data Pekerjaan berhasil disimpan.',
                'code' => 200,
                'error' => false,
                'data' => $job,
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
        $data1 = str_replace(".", "", $request->gaji1);
        $data2 = str_replace(".", "", $request->gaji2);
        $gaji1 = str_replace(",", ".", $data1);
        $gaji2 = str_replace(",", ".", $data2);

        $job = Job::find($id);
        $job->company_id = $request->company_id;
        $job->kategori = $request->kategori;
        $job->nama_pekerjaan = $request->nama_pekerjaan;
        $job->gaji1 = $gaji1;
        $job->gaji2 = $gaji2;
        $job->jam_kerja = $request->jam_kerja;
        $job->pengalaman = $request->pengalaman;
        $job->kemampuan_wajib = $request->kemampuan_wajib;
        $job->kemampuan_tambahan = $request->kemampuan_tambahan;
        $job->deskripsi = $request->deskripsi;
        $job->tgl_buat = $request->tgl_buat;
        $job->batas_tgl = $request->batas_tgl;
        $job->created_at = $request->created_at;
        $job->updated_at = $request->updated_at;


        try {
            $job->save();
            return response()->json([
                'message' => 'Data Pekerjaan berhasil diperbaharui.',
                'code' => 200,
                'error' => false,
                'data' => $job,
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

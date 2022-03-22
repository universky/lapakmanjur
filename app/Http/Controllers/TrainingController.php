<?php

namespace App\Http\Controllers;

use App\Models\Lpk;
use App\Models\Notification;
use App\Models\Pelatihan;
use App\Models\Training;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{

    public function index()
    {
        $trainings = Pelatihan::all();
        $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
        $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
        $user = Auth::user();

        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
        $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
        $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();

        return view('training.admin.index', [
            'trainings' => $trainings,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
            'user' => $user,
            'notif_ak1' => $notif_ak1,
            'notif_rekom' => $notif_rekom,
            'notif_lamaran' => $notif_lamaran,
            'notif_pelatihan' => $notif_pelatihan,
        ]);
    }
    public function create($id)
    {
        $lpks = Lpk::all();
        $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
        $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
        $user = Auth::user();

        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
        $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
        $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();
        return view('training.create', [
            'id' => $id,
            'lpks' => $lpks,
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
        $training = new Training();
        $training->lpk_id = $request->lpk_id;
        $training->nama_pelatihan = $request->nama_pelatihan;
        $training->kategori = $request->kategori;
        $training->jumlah_paket = $request->jumlah_paket;
        $training->jumlah_peserta = $request->jumlah_peserta;
        $training->status = "Aktif";
        $training->date = date('Y-m-d');
        $training->created_at = $request->created_at;
        $training->updated_at = $request->updated_at;


        try {
            $training->save();
            return response()->json([
                'message' => 'Program Pelatihan telah dibuat.',
                'code' => 200,
                'error' => false,
                'data' => $training,
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

    public function edit($id)
    {

        $training = Training::find($id);
        $lpks = Lpk::all();
        $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
        $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
        $user = Auth::user();

        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
        $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
        $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();
        // return $training;
        return view('training.edit', [
            'lpks' => $lpks,
            'training' => $training,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
            'user' => $user,
            'notif_ak1' => $notif_ak1,
            'notif_rekom' => $notif_rekom,
            'notif_lamaran' => $notif_lamaran,
            'notif_pelatihan' => $notif_pelatihan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $training = Training::find($id);
        $training->lpk_id = $request->lpk_id;
        $training->nama_pelatihan = $request->nama_pelatihan;
        $training->kategori = $request->kategori;
        $training->jumlah_paket = $request->jumlah_paket;
        $training->jumlah_peserta = $request->jumlah_peserta;
        $training->status = "Aktif";
        $training->date = date('Y-m-d');
        $training->created_at = $request->created_at;
        $training->updated_at = $request->updated_at;


        try {
            $training->save();
            return response()->json([
                'message' => 'Program Pelatihan telah diperbaharui.',
                'code' => 200,
                'error' => false,
                'data' => $training,
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

    public function destroy($id)
    {
        $training = Training::find($id);
        try {
            $training->delete();
            return [
                'message' => 'Data Pelatihan telah dihapus',
                'error' => false,
                'code' => 200,
            ];
        } catch (Exception $e) {
            return [
                'message' => 'internal error',
                'error' => true,
                'code' => 500,
                'errors' => $e,
            ];
        }
    }

    public function info_pelatihan(Request $request)
    {
        // $trainings = DB::table('trainings')->paginate(2);
        $trainings = Pelatihan::paginate(8);
        $lpks = Lpk::all();

        $sort_by = $request->query('sort_by');
        $kategori = $request->query('kategori');
        if ($sort_by == null) {
            $sort_by = "Terbaru";
        }

        if ($kategori == null) {
            $kategori = 0;
        }


        if ($kategori != 0) {
            $trainings = Pelatihan::where('kategori', $kategori)->paginate(8);
            // return $trainings;
        } else {
            $trainings = Pelatihan::paginate(8);
            // return $min_gaji;
        }

        $currentPage = $trainings->currentPage();
        $currentUrl = "/info_pelatihan?page=" . $currentPage;
        $prevPage = $trainings->previousPageUrl();
        $nextPage = $trainings->nextPageUrl();
        $next2Page = $currentPage + 2;
        $prev2Page = $currentPage - 2;
        $next2Url = "/info_pelatihan?page=" . $next2Page;
        $prev2Url = "/info_pelatihan?page=" . $prev2Page;

        $lastPage = $trainings->lastPage();

        $user = Auth::user();
        if ($user != null) {
            $user_id = Auth::user()->id;
            $notifications = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->get();
            $jumlah_notif = Notification::where('user_id', $user_id)->where('status', 0)->where('group_id', 2)->count();

            return view('training.info_pelatihan', [
                'trainings' => $trainings,
                'lpks' => $lpks,
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
                'kategori' => $kategori,
                'sort_by' => $sort_by
            ]);
        }



        // return $prevPage;
        // return $currentUrl;
        return view('training.info_pelatihan', [
            'trainings' => $trainings,
            'lpks' => $lpks,
            'currentPage' => $currentPage,
            'prevPage' => $prevPage,
            'nextPage' => $nextPage,
            'currentUrl' => $currentUrl,
            'next2Url' => $next2Url,
            'prev2Url' => $prev2Url,
            'lastPage' => $lastPage,
            'user' => $user,
            'kategori' => $kategori,
            'sort_by' => $sort_by
        ]);
    }

    public function detail($id)
    {
        $training = Pelatihan::find($id);
        $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
        $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
        $user = Auth::user();

        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
        $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
        $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();

        return view('training.admin.detail', [
            'training' => $training,
            'notifications' => $notifications,
            'jumlah_notif' => $jumlah_notif,
            'user' => $user,
            'notif_ak1' => $notif_ak1,
            'notif_rekom' => $notif_rekom,
            'notif_lamaran' => $notif_lamaran,
            'notif_pelatihan' => $notif_pelatihan,
        ]);
    }

    public function detail_pelatihan($id)
    {
        $training = Pelatihan::find($id);
        $notifications = Notification::where('group_id', 1)->where('status', 0)->get();
        $jumlah_notif = Notification::where('group_id', 1)->where('status', 0)->count();
        $user = Auth::user();

        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->count();
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->count();
        $notif_lamaran = Notification::where('notif_type', 'Lamaran')->where('group_id', 1)->where('status', 0)->count();
        $notif_pelatihan = Notification::where('notif_type', 'Pelatihan')->where('group_id', 1)->where('status', 0)->count();

        return view('training.detail_pelatihan', [
            'training' => $training,
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
        // dd($request->all());
        $training = Pelatihan::find($id);

        $training->kategori = $request->kategori;
        $training->jumlah_paket = $request->jumlah_paket;
        $training->jumlah_peserta = $request->jumlah_peserta;
        $training->status = "Approved";
        $training->alasan = $request->alasan;

        try {
            $training->save();
            return response()->json([
                'message' => 'Pelatihan berhasil Disetujui',
                'code' => 200,
                'error' => false,
                'data' => $training,
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
        $training = Pelatihan::find($id);

        $training->status = "Rejected";
        $training->alasan = $request->alasan;

        try {
            $training->save();
            return response()->json([
                'message' => 'Pelatihan berhasil ditolak',
                'code' => 200,
                'error' => false,
                'data' => $training,
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

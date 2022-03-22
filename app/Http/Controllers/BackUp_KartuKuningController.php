<?php

namespace App\Http\Controllers;

use App\Models\Education;
use PDF;
use App\Models\Experience;
use App\Models\JobExpectation;
use App\Models\KartuKuning;
use App\Models\Pengalaman;
use App\Models\Personal;
use App\Models\SkillLanguage;
use App\Models\UploadFile;
use App\Models\User;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class KartuKuningController extends Controller
{
    public function index()
    {
        $user_group = Auth::user()->group_id;

        if ($user_group == 1) {
            $personals = Personal::with('kartu_kunings')->get();

            return view('kartu_kuning.admin.index', [
                'personals' => $personals
            ]);
        } else {
            $user_id = Auth::user()->id;
            $kartu_kuning = KartuKuning::where('user_id', $user_id)->first();

            $nik = Auth()->user()->nik;
            $email = Auth()->user()->email;
            $date = date('Y-m-d');

            $number = substr($nik, 0, 4);
            $no_max_kk = KartuKuning::max('id');
            $no_pencari_kerja = $number . sprintf("%07d", $no_max_kk + 1) . date("dmy");

            if ($kartu_kuning == null) {
                $user = User::find($user_id);

                return view('kartu_kuning.index3', [
                    'nik' => $nik,
                    'email' => $email,
                    'no_pencari_kerja' => $no_pencari_kerja,
                    'user' => $user,
                    'date' => $date
                ]);
            } else {

                $id = $kartu_kuning['id'];
                $experiences = Experience::where('kartu_kuning_id', $id)->get();
                $personal = Personal::where('kartu_kuning_id', $id)->first();
                $education = Education::where('kartu_kuning_id', $id)->first();
                $job_expectation = JobExpectation::where('kartu_kuning_id', $id)->first();
                $skill_language = SkillLanguage::where('kartu_kuning_id', $id)->first();
                $upload_files = UploadFile::where('kartu_kuning_id', $id)->first();
                // return $experiences;

                // $education = Education::where('kartu_kuning_id', $id)->first();

                // return $experiences;

                return view('kartu_kuning.index2', [
                    'kartu_kuning' => $kartu_kuning,
                    'experiences' => $experiences,
                    'personal' => $personal,
                    'education' => $education,
                    'job_expectation' => $job_expectation,
                    'skill_language' => $skill_language,
                    'upload_files' => $upload_files
                ]);
            }
        }
    }

    // public function create()
    // {
    //     return view('kartu_kuning.create');
    // }

    public function edit($id)
    {
        $kartu_kuning = KartuKuning::find($id);
        $experiences = Experience::where('kartu_kuning_id', $id)->get();

        $src_foto = $kartu_kuning['foto'];
        $src_foto = "asset('files/foto/" . $src_foto . "')";

        // return $kartu_kuning;

        // return $src_foto;

        return view('kartu_kuning.edit', [
            'kartu_kuning' => $kartu_kuning,
            'experiences' => $experiences,
            'src_foto' => $src_foto,
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
            $kartu_kuning->nama_lengkap = $request->nama_lengkap;
            $kartu_kuning->jenis_kelamin = $request->jenis_kelamin;
            $kartu_kuning->kewarganegaraan = $request->kewarganegaraan;
            $kartu_kuning->kondisi_fisik = $request->kondisi_fisik;
            $kartu_kuning->tempat_lahir = $request->tempat_lahir;
            $kartu_kuning->tgl_lahir = $request->tgl_lahir;
            $kartu_kuning->status_perkawinan = $request->status_perkawinan;
            $kartu_kuning->agama = $request->agama;
            $kartu_kuning->alamat = $request->alamat;
            $kartu_kuning->rt = $request->rt;
            $kartu_kuning->rw = $request->rw;
            $kartu_kuning->kode_pos = $request->kode_pos;
            $kartu_kuning->no_hp = $request->no_hp;
            $kartu_kuning->tinggi_badan = $request->tinggi_badan;
            $kartu_kuning->berat_badan = $request->berat_badan;
            $kartu_kuning->pendidikan = $request->pendidikan;
            $kartu_kuning->jurusan = $request->jurusan;
            $kartu_kuning->nama_institusi = $request->nama_institusi;
            $kartu_kuning->tahun_lulus = $request->tahun_lulus;
            $kartu_kuning->lama_pendidikan = $request->lama_pendidikan;
            $kartu_kuning->ipk = $request->ipk;
            $kartu_kuning->penempatan = $request->penempatan;
            $kartu_kuning->provinsi_harapan = $request->provinsi_harapan;
            $kartu_kuning->kab_harapan = $request->kab_harapan;
            $kartu_kuning->sistem_pembayaran_harapan = $request->sistem_pembayaran_harapan;
            $kartu_kuning->min_gaji_harapan = $request->min_gaji_harapan;
            $kartu_kuning->keterampilan = $request->keterampilan;
            $kartu_kuning->bahasa = $request->bahasa;
            $kartu_kuning->masa_berlaku = $masa_berlaku;
            $kartu_kuning->date = $date;
            $kartu_kuning->status = "Pending";
            $kartu_kuning->created_at = $request->created_at;
            $kartu_kuning->updated_at = $request->updated_at;

            $foto = $request->file('foto');
            $nama_foto =  $kartu_kuning->nik . "_" . $request->foto_name;
            $foto->move('files/foto', $nama_foto);
            $kartu_kuning->foto = $nama_foto;

            $ijazah = $request->file('ijazah');
            $nama_ijazah =  $kartu_kuning->nik . "_" . $request->ijazah_name;
            $ijazah->move('files/ijazah', $nama_ijazah);
            $kartu_kuning->ijazah = $nama_ijazah;

            $kartu_kuning->save();

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

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {

            $date = date("Y-m-d");
            $masa_berlaku = date('Y-m-d', strtotime('+1 year', strtotime($date)));

            $kartu_kuning = KartuKuning::find($id);
            $kartu_kuning->no_pencari_kerja = $request->no_pencari_kerja;
            $kartu_kuning->nama_lengkap = $request->nama_lengkap;
            $kartu_kuning->jenis_kelamin = $request->jenis_kelamin;
            $kartu_kuning->kewarganegaraan = $request->kewarganegaraan;
            $kartu_kuning->kondisi_fisik = $request->kondisi_fisik;
            $kartu_kuning->tempat_lahir = $request->tempat_lahir;
            $kartu_kuning->tgl_lahir = $request->tgl_lahir;
            $kartu_kuning->status_perkawinan = $request->status_perkawinan;
            $kartu_kuning->agama = $request->agama;
            $kartu_kuning->alamat = $request->alamat;
            $kartu_kuning->rt = $request->rt;
            $kartu_kuning->rw = $request->rw;
            $kartu_kuning->kode_pos = $request->kode_pos;
            $kartu_kuning->no_hp = $request->no_hp;
            $kartu_kuning->tinggi_badan = $request->tinggi_badan;
            $kartu_kuning->berat_badan = $request->berat_badan;
            $kartu_kuning->pendidikan = $request->pendidikan;
            $kartu_kuning->jurusan = $request->jurusan;
            $kartu_kuning->nama_institusi = $request->nama_institusi;
            $kartu_kuning->tahun_lulus = $request->tahun_lulus;
            $kartu_kuning->lama_pendidikan = $request->lama_pendidikan;
            $kartu_kuning->ipk = $request->ipk;
            $kartu_kuning->penempatan = $request->penempatan;
            $kartu_kuning->provinsi_harapan = $request->provinsi_harapan;
            $kartu_kuning->kab_harapan = $request->kab_harapan;
            $kartu_kuning->sistem_pembayaran_harapan = $request->sistem_pembayaran_harapan;
            $kartu_kuning->min_gaji_harapan = $request->min_gaji_harapan;
            $kartu_kuning->keterampilan = $request->keterampilan;
            $kartu_kuning->bahasa = $request->bahasa;
            $kartu_kuning->masa_berlaku = $masa_berlaku;
            $kartu_kuning->date = $date;
            $kartu_kuning->status = "Pending";
            $kartu_kuning->created_at = $request->created_at;
            $kartu_kuning->updated_at = $request->updated_at;

            $kartu_kuning->save();

            // $del_experiece = Experience::where('kartu_kuning_id', $id);
            // $del_experiece->delete();

            // $experienceList = $request->experienceList;
            // foreach ($experienceList as $experienceL) {
            //     $experience = new Experience();
            //     $experience->kartu_kuning_id = $kartu_kuning->id;
            //     $experience->nama_perusahaan = $experienceL['nama_perusahaan'];
            //     $experience->jabatan = $experienceL['jabatan'];
            //     $experience->deskripsi_pekerjaan = $experienceL['deskripsi_pekerjaan'];
            //     $experience->lama_kerja = $experienceL['lama_kerja'];
            //     $experience->gaji = $experienceL['gaji'];
            //     $experience->created_at = $request->created_at;
            //     $experience->updated_at = $request->updated_at;
            //     $experience->save();
            // }

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
                'errors' => $e,
            ], 500);
        }
    }

    public function detail($id)
    {
        $kartu_kuning = KartuKuning::where('id', $id)->with('users')->first();
        $experiences = Experience::where('kartu_kuning_id', $id)->get();
        $personal = Personal::where('kartu_kuning_id', $id)->first();
        $education = Education::where('kartu_kuning_id', $id)->first();
        $job_expectation = JobExpectation::where('kartu_kuning_id', $id)->first();
        $skill_language = SkillLanguage::where('kartu_kuning_id', $id)->first();
        $upload_files = UploadFile::where('kartu_kuning_id', $id)->first();

        // return $kartu_kuning;

        return view('kartu_kuning.admin.detail', [
            'kartu_kuning' => $kartu_kuning,
            'experiences' => $experiences,
            'personal' => $personal,
            'education' => $education,
            'job_expectation' => $job_expectation,
            'skill_language' => $skill_language,
            'upload_files' => $upload_files
        ]);
    }

    public function approval(Request $request, $id)
    {
        $kartu_kuning = KartuKuning::find($id);

        $kartu_kuning->status = "Approved";
        $kartu_kuning->alasan = $request->alasan;

        try {
            $kartu_kuning->save();
            return response()->json([
                'message' => 'Kartu Kuning berhasil Disetujui',
                'code' => 200,
                'error' => false,
                'data' => $kartu_kuning,
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
        $kartu_kuning = KartuKuning::find($id);

        $kartu_kuning->status = "Rejected";
        $kartu_kuning->alasan = $request->alasan;

        try {
            $kartu_kuning->save();
            return response()->json([
                'message' => 'Kartu Kuning berhasil ditolak',
                'code' => 200,
                'error' => false,
                'data' => $kartu_kuning,
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

    public function cetak($id)
    {
        $kartu_kuning = KartuKuning::find($id);
        $nik = $kartu_kuning['nik'];
        $experiences = Experience::where('kartu_kuning_id', $id)->get();
        $personal = Personal::where('kartu_kuning_id', $id)->first();
        $education = Education::where('kartu_kuning_id', $id)->first();
        $job_expectation = JobExpectation::where('kartu_kuning_id', $id)->first();
        $skill_language = SkillLanguage::where('kartu_kuning_id', $id)->first();
        $upload_files = UploadFile::where('kartu_kuning_id', $id)->first();

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 'format' =>
            [150, 101],
            'margin_right' => '5',
            'margin_left' => '5',
            'margin_bottom' => '10',
            'margin_top' => '6',
        ]);
        $data = view('kartu_kuning.cetak', [
            'kartu_kuning' => $kartu_kuning,
            'experiences' => $experiences,
            'personal' => $personal,
            'education' => $education,
            'job_expectation' => $job_expectation,
            'skill_language' => $skill_language,
            'upload_files' => $upload_files
        ]);

        // $mpdf->Image('http://127.0.0.1:8004/images/vapehitz-logo2.jpeg', 0, 0, 210, 297, 'jpeg', '', true, false);
        $mpdf->WriteHTML($data);
        $file_name = 'AK1 - NIK ' . $nik . '.pdf';
        $mpdf->Output($file_name, 'I');
        exit();
    }

    public function cetak_permohonan($id)
    {
        $kartu_kuning = KartuKuning::find($id);
        $nik = $kartu_kuning['nik'];
        $experiences = Experience::where('kartu_kuning_id', $id)->get();
        $personal = Personal::where('kartu_kuning_id', $id)->first();
        $education = Education::where('kartu_kuning_id', $id)->first();
        $job_expectation = JobExpectation::where('kartu_kuning_id', $id)->first();
        $skill_language = SkillLanguage::where('kartu_kuning_id', $id)->first();
        $upload_files = UploadFile::where('kartu_kuning_id', $id)->first();

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 'format' =>
            'A4',
            'margin_right' => '5',
            'margin_left' => '5',
            'margin_bottom' => '10',
            'margin_top' => '6',
        ]);
        $data = view('kartu_kuning.admin.cetak_permohonan', [
            'kartu_kuning' => $kartu_kuning,
            'experiences' => $experiences,
            'personal' => $personal,
            'education' => $education,
            'job_expectation' => $job_expectation,
            'skill_language' => $skill_language,
            'upload_files' => $upload_files
        ]);

        // $mpdf->Image('http://127.0.0.1:8004/images/vapehitz-logo2.jpeg', 0, 0, 210, 297, 'jpeg', '', true, false);
        $mpdf->WriteHTML($data);
        $file_name = 'DATA PEMOHON AK1 - NIK ' . $nik . '.pdf';
        $mpdf->Output($file_name, 'I');
        exit();
    }

    public function edit_status($id)
    {
        $kartu_kuning = KartuKuning::find($id);

        $kartu_kuning->status = "Pending";

        try {
            $kartu_kuning->save();
            return redirect('kartu_kuning');
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

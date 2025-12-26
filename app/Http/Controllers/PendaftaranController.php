<?php

namespace App\Http\Controllers;

use App\Models\MstPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PendaftaranController extends Controller
{
    /**
     * Handle the Phase 1 registration submission.
     */
    public function storePhase1(Request $request)
    {
        // 1. Validation
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:150',
            'email_akun'   => 'required|email|max:100',
            'no_hp_siswa'  => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:100',
            'tgl_lahir'    => 'required|date',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'email_akun.required'   => 'Email wajib diisi.',
            'email_akun.email'      => 'Format email tidak valid.',
            'no_hp_siswa.required'  => 'Nomor HP wajib diisi.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tgl_lahir.required'    => 'Tanggal lahir wajib diisi.',
            'tgl_lahir.date'        => 'Format tanggal lahir tidak valid.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Mohon periksa kembali inputan Anda.');
        }

        // 2. Data Persistence with Error Handling
        try {
            DB::beginTransaction();

            $pendaftaran = MstPendaftaran::create([
                'nama_lengkap' => $request->nama_lengkap,
                'email_akun'   => $request->email_akun,
                'no_hp_siswa'  => $request->no_hp_siswa,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir'    => $request->tgl_lahir,
                // Status deafult is_active = 1 from DB default
            ]);

            DB::commit();

            // 3. Success Response (Redirect to Phase 2)
            return redirect()->route('pendaftaran.step2', $pendaftaran->id)
                ->with('success', 'Tahap 1 berhasil! Silakan lengkapi data berikut.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Pendaftaran Phase 1 Error: ' . $e->getMessage());

            // Professional Error Response
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan sistem saat memproses pendaftaran. Silakan coba beberapa saat lagi.');
        }
    }

    /**
     * Show Phase 2 form (Full Data).
     */
    public function step2($id)
    {
        $pendaftaran = MstPendaftaran::findOrFail($id);
        return view('pages.pendaftaran.step2', compact('pendaftaran'));
    }

    /**
     * Handle Phase 2 data submission (Update).
     */
    public function updateStep2(Request $request, $id)
    {
        $pendaftaran = MstPendaftaran::findOrFail($id);

        // Validation for Phase 2
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat_siswa' => 'required',
            'desa_siswa' => 'required',
            'kec_siswa' => 'required',
            'kab_siswa' => 'required',
            'prov_siswa' => 'required',
            'sekolah_asal_smp' => 'required',
            'nisn' => 'required',
            'nama_ayah' => 'required',
            'no_hp_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_hp_ibu' => 'required',
            'no_hp_ibu' => 'required',
            'ortu_karyawan_masehi' => 'nullable|in:YA,TIDAK',
            'bagian_karyawan_masehi' => 'nullable|string|max:100',
            'ortu_alumni_masehi' => 'nullable|in:YA,TIDAK',
            'unit_alumni_ortu' => 'nullable|string|max:100',
            'tahun_lulus_ortu' => 'nullable|string|max:20',
            'ortu_jemaat_gkmi' => 'nullable|in:YA,TIDAK',
            'nomor_anggota_gereja' => 'nullable|string|max:50',
            'file_foto_siswa' => 'nullable|image|max:2048',
            'file_ijazah' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
            'file_akte' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
            'file_raport' => 'nullable|mimes:pdf|max:5120',
            // 'other_file' => 'nullable|mimes:pdf,zip,rar|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Mohon lengkapi data wajib yang ditandai.');
        }

        try {
            DB::beginTransaction();

            $data = $request->except(['_token', '_method', 'file_foto_siswa', 'file_ijazah', 'file_akte', 'file_raport', 'other_file']);

            // Handle File Uploads
            if ($request->hasFile('file_foto_siswa')) {
                $file = $request->file('file_foto_siswa');
                $filename = time() . '_foto_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/pendaftaran'), $filename);
                $data['file_foto_siswa'] = $filename;
            }

            if ($request->hasFile('file_ijazah')) {
                $file = $request->file('file_ijazah');
                $filename = time() . '_ijazah_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/pendaftaran'), $filename);
                $data['file_ijazah'] = $filename;
            }

            if ($request->hasFile('file_akte')) {
                $file = $request->file('file_akte');
                $filename = time() . '_akte_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/pendaftaran'), $filename);
                $data['file_akte'] = $filename;
            }

            if ($request->hasFile('file_raport')) {
                $file = $request->file('file_raport');
                $filename = time() . '_raport_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/pendaftaran'), $filename);
                $data['file_raport'] = $filename;
            }

            if ($request->hasFile('other_file')) {
                $file = $request->file('other_file');
                $filename = time() . '_doc_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/pendaftaran'), $filename);
                $data['other_file'] = $filename;
            }

            $pendaftaran->update($data);

            DB::commit();

            return redirect()->route('home')->with('success', 'Pendaftaran Anda berhasil! Data telah tersimpan.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Pendaftaran Phase 2 Error: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'mst_pendaftaran';

    protected $fillable = [
        'is_active',
        // TAHAP 1
        'email_akun',
        'nama_lengkap',
        'tempat_lahir',
        'tgl_lahir',
        // TAHAP 2
        'jenis_kelamin',
        'agama',
        'alamat_siswa',
        'desa_siswa',
        'kec_siswa',
        'kab_siswa',
        'prov_siswa',
        'no_hp_siswa',
        'email_siswa',
        'sekolah_asal_smp',
        'nisn',
        'punya_saudara_masehi',
        'nama_saudara',
        'kelas_saudara',
        'unit_saudara',
        'nama_ayah',
        'tempat_lahir_ayah',
        'tgl_lahir_ayah',
        'no_hp_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'tempat_lahir_ibu',
        'tgl_lahir_ibu',
        'no_hp_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'alamat_ortu',
        'desa_ortu',
        'kec_ortu',
        'kab_ortu',
        'prov_ortu',
        'ortu_karyawan_masehi',
        'bagian_karyawan_masehi',
        'ortu_alumni_masehi',
        'unit_alumni_ortu',
        'tahun_lulus_ortu',
        'ortu_jemaat_gkmi',
        'nomor_anggota_gereja',
        'nama_wali',
        'tempat_lahir_wali',
        'tgl_lahir_wali',
        'no_hp_wali',
        'pekerjaan_wali',
        'penghasilan_wali',
        'alamat_wali',
        'desa_wali',
        'kec_wali',
        'kab_wali',
        'prov_wali',
        'file_foto_siswa',
        'file_ijazah',
        'file_akte',
        'file_raport',
        'other_file',
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
        'tgl_lahir_ayah' => 'date',
        'tgl_lahir_ibu' => 'date',
        'tgl_lahir_wali' => 'date',
        'is_active' => 'boolean',
    ];
}

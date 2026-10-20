<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    /** @use HasFactory<\Database\Factories\SantriFactory> */
    protected $fillable = [
        'nis', 'nik', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 
        'anak_ke', 'jumlah_saudara', 'no_kk', 'no_hp', 'golongan_darah', 'riwayat_penyakit',
        'alamat', 'rt', 'rw', 'provinsi', 'kabupaten', 'kecamatan', 'kode_pos', 
        'asal_sekolah', 'tanggal_masuk', 'status', 'foto',
        'nama_ayah', 'tempat_lahir_ayah', 'tanggal_lahir_ayah', 'nik_ayah', 'pendidikan_ayah', 'pekerjaan_ayah',
        'nama_ibu', 'tempat_lahir_ibu', 'tanggal_lahir_ibu', 'nik_ibu', 'pendidikan_ibu', 'pekerjaan_ibu',
        'alamat_ortu', 'penghasilan_ortu',
        'wali_nama', 'wali_kontak', 'alamat_wali', 'nik_wali', 'tempat_lahir_wali', 'tanggal_lahir_wali', 'pendidikan_wali', 'pekerjaan_wali'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function syahriyahs()
    {
        return $this->hasMany(Syahriyah::class);
    }
}

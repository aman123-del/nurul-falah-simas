<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('santris', function (Blueprint $table) {
            // Data Santri tambahan
            $table->string('nik')->nullable()->after('nis');
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable()->after('nama_lengkap');
            $table->integer('anak_ke')->nullable()->after('jenis_kelamin');
            $table->integer('jumlah_saudara')->nullable()->after('anak_ke');
            $table->string('no_kk')->nullable()->after('jumlah_saudara');
            $table->string('no_hp')->nullable()->after('no_kk');
            $table->string('golongan_darah')->nullable()->after('tanggal_lahir');
            $table->text('riwayat_penyakit')->nullable()->after('golongan_darah');

            // Alamat Detail
            $table->string('provinsi')->nullable()->after('rw');
            $table->string('kabupaten')->nullable()->after('provinsi');
            $table->string('kecamatan')->nullable()->after('kabupaten');
            $table->string('kode_pos')->nullable()->after('kecamatan');

            // Data Ayah
            $table->string('nama_ayah')->nullable();
            $table->string('tempat_lahir_ayah')->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();

            // Data Ibu
            $table->string('nama_ibu')->nullable();
            $table->string('tempat_lahir_ibu')->nullable();
            $table->date('tanggal_lahir_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            
            // Data Bersama Ortu
            $table->text('alamat_ortu')->nullable();
            $table->string('penghasilan_ortu')->nullable();

            // Data Wali tambahan (wali_nama dan wali_kontak sudah ada)
            $table->text('alamat_wali')->nullable();
            $table->string('nik_wali')->nullable();
            $table->string('tempat_lahir_wali')->nullable();
            $table->date('tanggal_lahir_wali')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('santris', function (Blueprint $table) {
            $table->dropColumn([
                'nik', 'jenis_kelamin', 'anak_ke', 'jumlah_saudara', 'no_kk', 'no_hp', 'golongan_darah', 'riwayat_penyakit',
                'provinsi', 'kabupaten', 'kecamatan', 'kode_pos',
                'nama_ayah', 'tempat_lahir_ayah', 'tanggal_lahir_ayah', 'nik_ayah', 'pendidikan_ayah', 'pekerjaan_ayah',
                'nama_ibu', 'tempat_lahir_ibu', 'tanggal_lahir_ibu', 'nik_ibu', 'pendidikan_ibu', 'pekerjaan_ibu',
                'alamat_ortu', 'penghasilan_ortu',
                'alamat_wali', 'nik_wali', 'tempat_lahir_wali', 'tanggal_lahir_wali', 'pendidikan_wali', 'pekerjaan_wali'
            ]);
        });
    }
};

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\VerifikasiBerkasPengajuan;

class VerifikasiBerkasPengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Schema::hasTable('verikasi_berkas_pengajuan')) {
            return;
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('verikasi_berkas_pengajuan')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        VerikasiBerkasPengajuan::create([
            'nip' => '197312271999031003',
            'status_konfirmasi' => 'disetujui',
            'catatan' => 'Berkas lengkap',
            'tanggal_pengajuan' => '2024-09-01 00:00:00',
            'tanggal_verifikasi' => '2024-10-01 00:00:00',
            'jenis_pangajuan' => 'sidang_akhir'
        ]);

        VerikasiBerkasPengajuan::create([
            'nip' => '198502102015042001',
            'status_konfirmasi' => 'tidak_disetujui',
            'catatan' => 'Berkas tidak lengkap',
            'tanggal_pengajuan' => '2024-09-01 00:00:00',
            'tanggal_verifikasi' => '2024-10-01 00:00:00',
            'jenis_pangajuan' => 'seminar_3'
        ]);
    }
}

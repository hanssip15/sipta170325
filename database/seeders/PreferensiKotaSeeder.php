<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreferensiKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Schema::hasTable('preferensi_kota')) {
            return;
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('preferensi_kota')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        PreferensiKota::create([
            'nip' => '197312271999031003',
            'id_kota' => '1'
        ]);

        PreferensiKota::create([
            'nip' => '198502102015042001',
            'id_kota' => '2'
        ]);
    }
}

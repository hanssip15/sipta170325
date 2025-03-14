<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RubrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Schema::hasTable('rubrik')) {
            return;
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('rubrik')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Rubrik::create([
            'id_kriteria' => 1,
            'nama_rubrik' => 'Kejelasan isi dokumen'
        ]);

        Rubrik::create([
            'id_kriteria' => 2,
            'nama_rubrik' => 'Kesesuaian dokumen dengan format'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UmrohSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('umrohs')->insert([
            'nama_paket' => 'Paket Umroh 9hari',
            'jenis' => 'Umroh',
            'tanggal_berangkat' => '2023-08-01',
            'durasi' => '9',
            'jasa_travel' => 'Anamiroh',
            'cp_travel' => '081234675897',
            'hotel' => 'Arab suite',
            'maskapai' => 'Qatar Airways',
            'harga' => '30000000',
            'foto' => 'a',
        ]);
    }
}

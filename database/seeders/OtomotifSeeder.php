<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtomotifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('otomotifs')->insert([
            'nama_kendaraan' => 'CBR 150R',
            'deskripsi' => 'ini motor bagus dari honda. Di buat pada tahum 2018n sudah spek motor balap oek banget nih',
            'merk' => 'Honda',
            'kapasitas_mesin' => '150',
            'warna' => 'Merah',
            'transmisi' => 'manual',
            'kilometer' => '30000',
            'tahun' => '2018',
            'status' => 'bekas',
            'lokasi' => 'Blitar',
            'harga' => '25000000',
            'foto1' => 'a',
            'foto2' => 'a',
            'foto3' => 'a',
            'foto_bpkb' => 'a',
        ]);
    }
}



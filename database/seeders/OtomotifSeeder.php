<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtomotifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('otomotifs')->insert([
            [
                'user_id' => 1,
                'nama_kendaraan' => 'Honda Civic',
                'deskripsi' => 'Mobil sedan terbaru dari Honda.',
                'merk' => 'Honda',
                'kapasitas_mesin' => 1500,
                'warna' => 'Merah',
                'transmisi' => 'matic',
                'kilometer' => 0,
                'tahun' => 2023,
                'status' => 'baru',
                'lokasi' => 'Jakarta',
                'harga' => 350000000,
                'foto1' => 'honda_civic_front.jpg',
                'foto2' => 'honda_civic_back.jpg',
                'foto3' => 'honda_civic_interior.jpg',
                'status_etalase' => 'not yet approved',
                'status_pembelian' => 'not yet purchased',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'nama_kendaraan' => 'Toyota Fortuner',
                'deskripsi' => 'SUV mewah dari Toyota.',
                'merk' => 'Toyota',
                'kapasitas_mesin' => 2500,
                'warna' => 'Hitam',
                'transmisi' => 'manual',
                'kilometer' => 12000,
                'tahun' => 2020,
                'status' => 'bekas',
                'lokasi' => 'Surabaya',
                'harga' => 500000000,
                'foto1' => 'toyota_fortuner_front.jpg',
                'foto2' => 'toyota_fortuner_back.jpg',
                'foto3' => 'toyota_fortuner_interior.jpg',
                'status_etalase' => 'not yet approved',
                'status_pembelian' => 'not yet purchased',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add three more data entries as needed
        ]);
    }
}

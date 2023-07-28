<?php

use Illuminate\Database\Seeder;
use App\Models\Umrah;

class UmrahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh data umrah
        $umrahData = [
            [
                'user_id' => 2,
                'nama_user' => 'Adimas',
                'no_HP_User' => '08123456789',
                'nama_paket' => 'Paket Umrah 9 Hari',
                'jenis' => 'Umroh',
                'tgl_berangkat' => '2023-08-01',
                'jumlah_jemaah' => 5,
                'durasi' => 9,
                'jasa_travel' => 'Anamiroh',
                'CP_Admin' => '081234675897',
                'hotel' => 'Arab suite',
                'maskapai' => 'Qatar Airways',
                'harga' => 30000000,

                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        // Masukkan data umrah ke dalam tabel "umrah"
        Umrah::insert($umrahData);
    }
}

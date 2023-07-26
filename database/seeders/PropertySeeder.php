<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
<<<<<<< Updated upstream
=======
use Illuminate\Support\Facades\DB;
>>>>>>> Stashed changes

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
<<<<<<< Updated upstream
     */
    public function run(): void
    {
        //
=======
     *
     * @return void
     */
    public function run()
    {
        // Contoh data untuk table_produk_property
        $produkProperties = [
            [
                'user_id' => 1,
                'nama_property' => 'Property 1',
                'jenis' => 'Rumah',
                'deskripsi' => 'Deskripsi property 1',
                'Alamat' => 'Alamat property 1',
                'luas_tanah' => '100 m2',
                'luas_bangunan' => '80 m2',
                'foto1' => 'foto1.jpg',
                'foto2' => 'foto2.jpg',
                'foto3' => 'foto3.jpg',
                'foto_Sertifikat' => 'sertifikat.jpg',
                'harga' => 100000000,
                'status_etalase' => 'not yet approved',
                'status_pembelian' => 'not yet purchased',
            ],
            [
                'user_id' => 2,
                'nama_property' => 'Property 2',
                'jenis' => 'Apartemen',
                'deskripsi' => 'Deskripsi property 2',
                'Alamat' => 'Alamat property 2',
                'luas_tanah' => '50 m2',
                'luas_bangunan' => '40 m2',
                'foto1' => 'foto1.jpg',
                'foto2' => 'foto2.jpg',
                'foto3' => 'foto3.jpg',
                'foto_Sertifikat' => 'sertifikat.jpg',
                'harga' => 80000000,
                'status_etalase' => 'not yet approved',
                'status_pembelian' => 'not yet purchased',
            ],
            // Tambahkan data lainnya sesuai kebutuhan...
        ];

>>>>>>> Stashed changes
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('propertis')->insert([
            'nama_properti' => 'Dijual Rumah',
            'jenis' => 'Rumah',
            'foto1' => 'A',
            'foto2' => 'A',
            'foto3' => 'A',
            'foto_sertifikat' => 'a',
            'deskripsi' => 'Halo Ini Rumah',
            'alamat' => 'Jl. Dr Sutomo',
            'kecamatan' => 'Sananwetan',
            'kota' => 'Blitar',
            'luas' => '93',
            'harga' => '300000000',

        ]);
    }
}

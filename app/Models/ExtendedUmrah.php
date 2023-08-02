<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtendedUmrah extends Model
{
    protected $table = 'extended_umrah';

    protected $fillable = [
        'id_user',
        'nama_user',
        'No_hp',
        'thumbnail',
        'nama_paket',
        'jenis',
        'tanggal_berangkat',
        'jumlah_jemaah',
        'durasi',
        'jasa_travel',
        'id_Admin',
        'Nama_Admin',
        'CP_Admin',
        'Hotel',
        'Maskapai',
        'harga_estimasi',
        'no_kk',
        'foto_kk',
        'harga_total',
    ];

    // Jika atribut `Id` merupakan primary key dengan auto increment, tambahkan baris berikut:
    // protected $primaryKey = 'Id';
    // public $incrementing = true;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtalaseUmrah extends Model
{
    protected $table = 'etalase_umrah';

    protected $fillable = [
        'admin_name', // tambahkan atribut `admin_name` pada array ini
        'user_id',
        'thumbnail',
        'deskripsi', // tambahkan atribut `deskripsi` pada array ini
        'nama_paket',
        'jenis',
        'tanggal_berangkat',
        'durasi',
        'jasa_travel',
        'CP_Admin',
        'Hotel',
        'Maskapai',
        'harga',
    ];

    // Jika atribut `Id` merupakan primary key dengan auto increment, tambahkan baris berikut:
    // protected $primaryKey = 'Id';
    // public $incrementing = true;
}

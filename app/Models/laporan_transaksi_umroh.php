<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_transaksi_umroh extends Model
{
    protected $table = 'laporan_transaksi_umroh';

    protected $fillable = [
        'id_user_uploader',
        'upload_by_user_name',
        'No_hp_uploader',
        'thumbnail',
        'nama_paket',
        'jenis',
        'deskripsi',
        'fasilitas 1',
        'fasilitas 2',
        'fasilitas 3',
        'fasilitas 4',
        'fasilitas 5',
        'fasilitas 6',
        'fasilitas 7',
        'fasilitas 8',
        'fasilitas 9',
        'fasilitas 10',
        'tanggal_berangkat',
        'durasi',
        'jasa_travel',
        'Hotel',
        'Maskapai',
        'harga_awal',
        'jumlah_jemaah',
        'no_kk',
        'foto_kk',
        'total_biaya_tambahan',
        'harga_total',
    ];

}

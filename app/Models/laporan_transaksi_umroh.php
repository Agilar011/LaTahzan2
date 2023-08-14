<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan_transaksi_umroh extends Model
{
    use HasFactory;
    protected $table = 'laporan_transaksi_umroh';

    protected $fillable = [
        'id_user_uploader',
        'nama_user_uploader',
        'No_hp_uploader',
        'thumbnail',
        'nama_paket',
        'jenis',
        'deskripsi',
        'fasilitas1',
        'fasilitas2',
        'fasilitas3',
        'fasilitas4',
        'fasilitas5',
        'fasilitas6',
        'fasilitas7',
        'fasilitas8',
        'fasilitas9',
        'fasilitas10',
        'tanggal_berangkat',
        'durasi',
        'jasa_travel',
        'Hotel',
        'Maskapai',
        'harga_awal',
        'jumlah_jemaah',
        'purchased_by_user_id',
        'purchased_by_user_name',
        'jumlah_jemaah',
        'no_kk',
        'foto_kk',
        'total_biaya_tambahan',
        'harga_total',
    ];

}

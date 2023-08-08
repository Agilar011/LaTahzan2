<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiUmroh extends Model
{
    protected $table = 'transaksi_umroh';

    protected $fillable = [
        'id_etalase_umroh',
        'upload_by_user_id',
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
        'purchased_by_user_id',
        'purchased_by_user_name',
        'jumlah_jemaah',
        'no_kk',
        'foto_kk',
        'harga_total',
        'status_pembelian',
        'approved_by_user_id',
    ];

    // Jika atribut `Id` merupakan primary key dengan auto increment, tambahkan baris berikut:
    // protected $primaryKey = 'Id';
    // public $incrementing = true;

    public function jemaah()
    {
        return $this->hasMany(Jemaah::class, 'id_etalase_umroh');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtalaseUmrah extends Model
{
    protected $table = 'etalase_umrah';
    protected $fillable = [
        'thumbnail',
        'nama_paket',
        'jenis',
        'deskripsi',
        'tanggal_berangkat',
        'durasi',
        'jasa_travel',
        'CP_Admin',
        'Hotel',
        'Maskapai',
        'harga',
        'upload_by_user_id',
        'upload_by_user_name',
        'approved_by_user_id',
        'approved_by_user_name',
        'purchased_by_user_id',
        'purchased_by_user_name',
        'status_etalase',
        'status_pembelian',
    ];

    public function jemaah()
    {
        return $this->hasMany(Jemaah::class, 'id_etalase_umroh');
    }

    // Define relationships, if any
    // For example:
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'Upload_by_user_id');
    // }
}

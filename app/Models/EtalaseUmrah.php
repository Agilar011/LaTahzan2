<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtalaseUmrah extends Model
{
    protected $table = 'etalase_umrah';
    protected $fillable = [
        'upload_by_user_id',
        'upload_by_user_name',
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
        'approved_by_user_id',
        'approved_by_user_name',
        'status_etalase',
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

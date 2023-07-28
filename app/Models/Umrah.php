<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umrah extends Model
{
    protected $table = 'umrah'; // Nama tabel yang terkait dengan model

    protected $fillable = [
        'user_id',
        'nama_user',
        'no_HP',
        'nama_paket',
        'jenis',
        'tgl_berangkat',
        'jumlah_jemaah',
        'durasi',
        'jasa_travel',
        'CP_Admin',
        'hotel',
        'maskapai',
        'harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Definisi relasi "belongsTo" ke model User berdasarkan user_id
    }
}

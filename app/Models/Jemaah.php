<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jemaah extends Model
{
    protected $table = 'jemaah';

    protected $fillable = [
        'nama_jemaah',
        'NIK',
        'No_hp',
        'no_paspor',
        'foto_paspor',
        'foto_KTP',
        'status_vaksin',
        'foto_vaksin',
        'biaya_jasa_paspor',
        'biaya_jasa_vaksin',
        'biaya_akhir',
    ];

    // Jika atribut `id` merupakan primary key dengan auto increment, tambahkan baris berikut:
    // protected $primaryKey = 'id';
    // public $incrementing = true;
}

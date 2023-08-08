<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jemaah extends Model
{
    protected $table = 'jemaah';

    protected $fillable = [
        'id_extended_umroh', // tambahkan atribut ini
        'nama_jemaah',
        'NIK',
        'No_hp',
        'foto_identitas',
        'status_paspor',
        'no_paspor',
        'foto_paspor',
        'biaya_jasa_paspor',
        'status_vaksin',
        'foto_vaksin',
        'biaya_jasa_vaksin',
        'biaya_awal',
        'biaya_akhir',
    ];



    // Jika atribut `id` merupakan primary key dengan auto increment, tambahkan baris berikut:
    // protected $primaryKey = 'id';
    // public $incrementing = true;
}

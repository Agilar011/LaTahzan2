<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properti extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable =[
                // Space untuk foto ktp uploader
                'no_ktp_buyer',
                'foto_ktp_buyer',

    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properti extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = [
        'upload_by_user_id'	,
        'upload_by_user_name',
        'no_hp_uploader',
        'nama_properti',
        'jenis',
        'foto1',
        'foto2',
        'foto3',
        'foto_sertifikat',
        'foto_ktp',
        'deskripsi',
        'alamat',
        'kecamatan',
        'kota',
        'luas',
        'harga',
        'approved_by_user_id',
        'approved_by_user_name',
        'purchased_by_user_id',
        'purchased_by_user_name',
        'foto_ktp_purchaser',
        'no_ktp_purchaser',
        'purchased_by_user_phone_number',
        'status_etalase',
        'status_pembelian',
        'approved_payment_by_user_id',
        'approved_payment_by_user_name',
    ];
}

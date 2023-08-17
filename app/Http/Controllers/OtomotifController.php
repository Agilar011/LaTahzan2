<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otomotif extends Model
{
    use HasFactory;
    protected $fillable = [
        'upload_by_user_id'	,
        'upload_by_user_name',
        'no_hp_uploader',
        'nama_kendaraan',
        'deskripsi',
        'merk',
        'kapasitas_mesin',
        'warna',
        'transmisi',
        'kilometer',
        'tahun',
        'status',
        'alamat',
        'kecamatan',
        'kota',
        'harga',
        'foto1',
        'foto2',
        'foto3',
        'foto_bpkb',
        'foto_stnk',
        'foto_ktp',
        'approved_by_user_id',
        'approved_by_user_name',
        'purchased_by_user_id',
        'purchased_by_user_name',
        'purchased_by_user_phone_number',
        // Space untuk foto ktp uploader
        'no_ktp_buyer',
        'foto_ktp_buyer',
        'status_etalase',
        'status_pembelian',
        'approved_payment_by_user_id',
        'approved_payment_by_user_name',

    ];}

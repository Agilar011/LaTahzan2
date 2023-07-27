<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'table_property'; // Sesuaikan dengan nama tabel yang sebenarnya di database


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function approvedByUser()
    {
        return $this->belongsTo(User::class, 'approved_by_user_id');
    }

    public function purchasedByUser()
    {
        return $this->belongsTo(User::class, 'purchased_by_user_id');
    }
}

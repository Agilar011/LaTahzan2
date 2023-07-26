<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otomotif extends Model
{
    // ...

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

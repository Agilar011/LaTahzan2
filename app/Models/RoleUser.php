<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';
    public $timestamps = false;

    // Specify the primary key columns
    protected $primaryKey = ['user_id', 'role_id'];
    public $incrementing = false;

    // Fillable columns
    protected $fillable = ['role_id', 'user_id'];

    // Relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with Role model
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
}

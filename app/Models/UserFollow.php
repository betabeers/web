<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    protected $table = 'users_follows';
    protected $fillable = ['from_id', 'to_id'];
}

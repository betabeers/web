<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'alternate_names', 'code', 'lang'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}

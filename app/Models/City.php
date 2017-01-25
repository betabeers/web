<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['province_id', 'country_id', 'name', 'alternate_names', 'lat', 'lon', 'code', 'population', 'timezone'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

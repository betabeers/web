<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_id', 'country_id', 'name', 'alternate_names', 'lat', 'lon', 'code', 'population', 'timezone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * Relations
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

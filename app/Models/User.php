<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $hidden = ['password', 'remember_token'];
    protected $fillable = [
        'name', 'email', 'password', 'slug', 'body', 'phone', 'freelance', 'country_id', 'city_id', 'province_id',
        'location', 'portafolio', 'lookingfor', 'unemployed', 'can_contact', 'newsletter', 'alert_commercial',
        'company_name', 'company_email', 'company_cif', 'company_addresses', 'url', 'linkedin_url', 'twitter_url',
        'forrst_url', 'github_url', 'dribbble_url', 'flickr_url', 'youtube_url', 'stackoverflow_url', 'vimeo_url',
        'delicius_url', 'pinboard_url', 'itunes_url', 'android_url', 'chrome_url', 'masterbranch_url', 'bitbucket_url',
    ];

    public function findBySlugAndId($slug, $id)
    {
        return $this->where('slug', $slug)->findOrFail($id);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function tags()
    {
        return $this->morphMany(Tag::class, 'taggable');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function followers()
    {
        return $this->hasMany(UserFollow::class, 'to_id');
    }

    public function followings()
    {
        return $this->hasMany(UserFollow::class, 'from_id');
    }
}

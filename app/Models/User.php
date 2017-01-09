<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug', 'body', 'phone', 'freelance', 'country_id', 'city_id', 'province_id',
        'location', 'portafolio', 'lookingfor', 'unemployed', 'can_contact', 'newsletter', 'alert_commercial',
        'company_name', 'company_email', 'company_cif', 'company_addresses', 'url', 'linkedin_url', 'twitter_url',
        'forrst_url', 'github_url', 'dribbble_url', 'flickr_url', 'youtube_url', 'stackoverflow_url', 'vimeo_url',
        'delicius_url', 'pinboard_url', 'itunes_url', 'android_url', 'chrome_url', 'masterbranch_url', 'bitbucket_url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Find user by slug and id
     *
     * @param $slug
     * @param $id
     */
    public function findBySlugAndId($slug, $id)
    {
        return $this->where('slug', $slug)->findOrFail($id);
    }

    /**
     * Encrypt password automatically
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
    * Send the password reset notification.
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Relations
     */
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
}

<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $hidden = ['password', 'remember_token'];
    protected $guarded = [
        'admin',
        'moderator',
        'visible',
        'karma',
        'votes',
        'visits',
        'total_logins',
        'last_login',
        'banned',
        'date_newsletter',
        'facebook_id',
        'twitter_id',
        'google_id',
        'github_id',
        'linkedin_id',
        'amazon_id',
        'visits_google',
        'visits_finder',
        'remember_token'
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
        return $this->belongsToMany('App\Models\User', 'users_follows', 'to_id', 'from_id');
    }

    public function following()
    {
        return $this->belongsToMany('App\Models\User', 'users_follows', 'from_id', 'to_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'username',
        'email',
        'password',
        'is_email_verified',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function businesses()
    {
        return $this->hasMany(Businesses::class);
    }

    public function monthlyfood()
    {
        return $this->hasMany(Monthlyfoods::class);
    }

    public function usbuyfoods()
    {
return $this->hasMany('App\Models\Buyfoods');

    }

    public function sendmarketbudgets()
    {
        return $this->hasMany(Sendmarkets::class);
    }

    public function apis()
    {
        return $this->hasMany(Apis::class);
    }

    public function budgets()
    {
        return $this->hasMany(Budgets::class);
    }

    public function temails()
    {
        return $this->hasMany(Emails::class);
    }

    public function tsendbudgets()
    {
        return $this->hasMany(Sendbudgets::class);
    }
}

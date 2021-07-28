<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;


class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasFactory, Notifiable, SoftDeletes;

    public const BASIC_USER = 0;
    public const MODERATOR = 1;
    public const ADMIN = 2;


    protected $dates = [
        'created_at',
        'updated_at',
        'expiry_date',
        'updated_at',

    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'expiry_date' => 'date:d-m-Y',
        'created_at' => 'datetime:d-m-Y H:m',
        'updated_at' => 'datetime:d-m-Y H:m',

    ];



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'subscribed',
        'expiry_date',
        'subscription_count',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */


    public function getExpiryDateAttribute($value) {

        if ($value !== null){
            return Carbon::parse($value)->format('d-m-Y');
        } else {
            return null;
        }
    }

    public function setExpiryDateAttribute($value) {

        if ($value !== null){
            $this->attributes['expiry_date'] = Carbon::parse($value);
        } else {
            $this->attributes['expiry_date'] = null;
        }
    }

    public function getCreatedAtAttribute($value) {

        if ($value !== null){
            return Carbon::parse($value)->format('d-m-Y H:m');
        } else {
            return null;
        }
    }

    public function setCreatedAtAttribute($value) {

        if ($value !== null){
            $this->attributes['created_at'] = Carbon::parse($value);
        } else {
            $this->attributes['created_at'] = now(); //field not nullable, fall back to default now() if anything goes wrong
        }
    }

    public function getUpdatedAtAttribute($value) {

        if ($value !== null){
            return Carbon::parse($value)->format('d-m-Y H:m');
        } else {
            return null;
        }
    }

    public function setUpdatedAtAttribute($value) {

        if ($value !== null) {
            $this->attributes['updated_at'] = Carbon::parse($value);
        } else {
            $this->attributes['updated_at'] = now(); //field not nullable, fall back to default now() if anything goes wrong
        }
    }
}

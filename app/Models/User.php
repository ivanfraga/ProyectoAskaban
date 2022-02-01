<?php

namespace App\Models;

use App\Traits\HasImage;
use Carbon\Carbon;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasImage;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'first_name',
        'last_name',
        'username',
        'personal_phone',
        'home_phone',
        'address',
        'password',
        'email',
        'birthdate',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function wards(){
        return $this->belongsToMany(Ward::class)->withTimestamps();

    }

    public function jails(){
        return $this->belongsToMany(Jail::class)->withTimestamps();
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }


    public function getFullName():string{
        return "$this->first_name $this->last_name";
    }

    public function getBirthdateAttribute($value)
    {
        // https://laravel.com/docs/8.x/eloquent-mutators#accessors-and-mutators
        return isset($value) ? Carbon::parse($value)->format('d/m/Y') : null;
    }


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

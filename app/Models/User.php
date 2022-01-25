<?php

namespace App\Models;

// use Carbon\Carbon;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'image',
        'facebook_id',
        'google_id',
        'is_admin',
        'province_id',
        'district_id',
        'ward_id',
        'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Relations

    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }

    public function fk_province()
    {
        return $this->hasOne(Province::class, 'id', 'city_id');
    }

    public function fk_district()
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }

    public function fk_ward()
    {
        return $this->hasOne(Ward::class, 'id', 'ward_id');
    }

    public function get_full_address()
    {
        $list = [];
        if (!empty($this->address)) {
            $list = [$this->address];
        }
        if (!empty($this->fk_ward->name)) {
            $list[] = $this->fk_ward->name;
        }
        if (!empty($this->fk_district->name)) {
            $list[] = $this->fk_district->name;
        }
        if (!empty($this->fk_province->name)) {
            $list[] = $this->fk_province->name;
        }
        return implode(", ", $list);
    }

    /**
     * Get hide email attribute by user
     * 
     * @return string
     */
    // public function getHideEmailAttribute()
    // {
    //     $email = $this->email;
    //     if (!$email) return '';

    //     $arr = explode('@', $email);
    //     $first = $arr[0];
    //     if (strlen($first) > 1) {
    //         for ($i = 0; $i < strlen($first) - 1; $i++) {
    //             $first[$i] = '*';
    //         }
    //     } else {
    //         $first = '*';
    //     }
    //     $arr[0] = $first;
    //     return join('@', $arr);
    // }
}

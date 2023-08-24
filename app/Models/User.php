<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Car;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $guarded = false;

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

    public function isAdmin() {
        return $this->role == 'admin';
    }

    public function likedCars() {
        return $this->belongsToMany(Car::class, 'car_user_like', 'user_id', 'car_id');
    }

    public function countFavCars() {

        $count = Car::join('brands', 'cars.brand_id', '=', 'brands.id')
                    ->join('car_user_like', 'cars.id' , '=', 'car_user_like.car_id')
                    -> select  ('cars.id', 'image', 'brand_name', 'model', 'price',
                    'year', 'transmission_type', 'engine_type', 'body_type')
                    ->where('car_user_like.user_id', auth()->user()->id)
                    ->count();

        return $count;
        // return response()->json(['count' => $count]);
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Gate;

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
                            'email',
                            'password',
                            'phone_number',
                            'is_admin',
                            'is_super_admin',
                            'verification_token',
                            'token_created_at',
                            'token_expires_at'
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
    public function order(){
        return $this->hasMany(Order::class);

    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
    Gate::define('edit-settings', function (User $user) {
        return $user->isAdmin
                    ? Response::allow()
                    : Response::denyWithStatus(404);
    });
}

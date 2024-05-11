<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'email',
        'password',
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
        'password' => 'hashed',
    ];
    public static function getUsuarios($id = '')
    {
        if ($id == '') {
            return User::all();
        } else {
            return User::leftjoin('throttle_config as t', 'users.id', 't.id_usuario')->where('users.id', $id)
                ->leftjoin('catalogo as cargo', 'users.id_cargo', 'cargo.id')
                ->first([
                    'users.id',
                    'users.email',
                    'users.first_name',
                    'users.last_name',
                    'users.identify',
                    'users.address',
                    'users.user',
                    't.max_attempts',
                    't.decay_minutes',
                    'cargo.nombre as cargo'
                ]);
        }
    }
}

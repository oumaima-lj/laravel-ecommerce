<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory; protected
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
    public function orders(): HasMany{

        return $this->hasMany(Order::class);
        
        }
        
        }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }






<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        'isAdmin',
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

    /**
     * Criar usuário
     */
    public static function createUser(
        string $name,
        string $email,
        string $password,
        bool $isAdmin = false
    ) {
        return self::insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'isAdmin' => $isAdmin,
        ]);
    }

    /**
     * Retornar usuário com base no email
     */
    public static function getUserByEmail(string $email)
    {
        return self::where(['email' => $email])->first();
    }

    public function isAdmin()
    {
        return $this->isAdmin == true;
    }
}

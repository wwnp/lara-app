<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        // 'role',
        'avatar_url',
        // 'password_confirmation',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new VerifyEmail);
    // }

    // public function isAdmin(): bool
    // {
    //     return $this->role === UserRole::ADMIN;
    // }
    // public function isAuthor(): bool
    // {
    //     return $this->role === UserRole::AUTHOR;
    // }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}

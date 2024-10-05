<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users'; // Jika tabel kamu tidak menggunakan penamaan default
    protected $primaryKey = 'user_id'; // Menetapkan user_id sebagai kunci utama

    protected $fillable = [
        'name', 'email', 'nik', 'address', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

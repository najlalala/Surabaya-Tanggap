<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponAduan extends Model
{
    use HasFactory;

    protected $table = 'respon_aduan';

    protected $fillable = [
        'aduan_id',
        'user_id',
        'pesan_respon',
        'tanggal_respon',
    ];

    public $timestamps = false; // Tambahkan ini untuk menonaktifkan timestamps

    // Definisikan relasi jika diperlukan
    public function aduan()
    {
        return $this->belongsTo(Aduan::class, 'aduan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

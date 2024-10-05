<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    protected $table = 'aduan'; // Nama tabel di database
    protected $primaryKey = 'aduan_id'; // Menggunakan 'aduan_id' sebagai primary key

    // Kolom yang bisa diisi
    protected $fillable = [
        'user_id', 
        'topik_id', 
        'opd_id', 
        'judul_aduan', 
        'kecamatan', 
        'kelurahan', 
        'lokasi_detail', 
        'deskripsi_aduan', 
        'lampiran', 
        'tanggal_pengaduan', 
        'status',
    ];

    public $timestamps = false; // Menonaktifkan timestamps

    // Hubungan dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Hubungan dengan model ResponAduan
    public function responAduan()
    {
        return $this->hasMany(ResponAduan::class, 'aduan_id', 'aduan_id'); // Hubungkan dengan kolom aduan_id di tabel respon_aduan
    }    

    // Hubungan dengan model TopikPengaduan
    public function topik()
    {
        return $this->belongsTo(TopikPengaduan::class, 'topik_id');
    }
}

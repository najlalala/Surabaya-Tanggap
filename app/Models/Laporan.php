<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = ['nomor_pendaftaran', 'pin', 'deskripsi', 'status'];

    // Relasi ke Tanggapan
    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class);
    }
}

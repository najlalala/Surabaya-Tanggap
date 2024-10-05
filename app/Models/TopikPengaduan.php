<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopikPengaduan extends Model
{
    use HasFactory;

    protected $table = 'topik_pengaduan'; // Nama tabel di database
    protected $primaryKey = 'topik_id'; // Primary key dari tabel jika berbeda dari 'id'

    // Kolom yang bisa diisi (opsional jika ingin menggunakan mass assignment)
    protected $fillable = ['nama_topik'];
}

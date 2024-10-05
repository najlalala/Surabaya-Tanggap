<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasusController extends Controller
{
public function cekKasus()
{
    // Logika untuk mendapatkan data kasus
    return view('cek-kasus'); // Pastikan nama view sudah benar
}
}
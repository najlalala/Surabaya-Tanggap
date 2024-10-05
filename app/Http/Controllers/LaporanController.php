<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Menampilkan detail laporan berdasarkan ID
    public function detail($id)
    {
        $laporan = Laporan::findOrFail($id);
        $tanggapans = Tanggapan::where('laporan_id', $id)->get(); // Ambil semua tanggapan untuk laporan ini
        
        return view('laporan.detail', compact('laporan', 'tanggapans'));
    }

    // Menangani proses tanggapan dari warga atau admin
    public function beriTanggapan(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string',
        ]);

        $tanggapan = new Tanggapan();
        $tanggapan->laporan_id = $id;
        $tanggapan->user_id = auth()->id(); // Mengambil ID pengguna yang memberikan tanggapan
        $tanggapan->isi_tanggapan = $request->tanggapan;
        $tanggapan->save();

        return redirect()->route('laporan.detail', $id)->with('success', 'Tanggapan berhasil dikirim.');
    }
}

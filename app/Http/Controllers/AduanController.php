<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\ResponAduan; // Tambahkan import model ResponAduan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AduanController extends Controller
{
    public function index()
    {
        $aduans = Aduan::with('topik')->where('user_id', Auth::id())->get();
        return view('warga.aduan.index', compact('aduans'));
    }    

    public function create()
    {
        return view('warga.aduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'topik_id' => 'required|exists:topik_pengaduan,id',
            'judul_aduan' => 'required|string|max:255',
            'deskripsi_aduan' => 'required|string',
            'kecamatan' => 'nullable|string|max:100',
            'kelurahan' => 'nullable|string|max:100',
            'lokasi_detail' => 'nullable|string|max:255',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $aduan = new Aduan();
        $aduan->user_id = Auth::id();
        $aduan->topik_id = $request->topik_id;
        $aduan->judul_aduan = $request->judul_aduan;
        $aduan->deskripsi_aduan = $request->deskripsi_aduan;
        $aduan->kecamatan = $request->kecamatan;
        $aduan->kelurahan = $request->kelurahan;
        $aduan->lokasi_detail = $request->lokasi_detail;

        if ($request->hasFile('lampiran')) {
            $aduan->lampiran = $request->file('lampiran')->store('lampiran', 'public');
        }

        $aduan->save();

        return redirect()->route('warga.status-aduan')->with('success', 'Aduan berhasil dibuat.');
    }

    public function edit($id)
    {
        $aduan = Aduan::findOrFail($id);
        return view('warga.aduan.edit', compact('aduan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'topik_id' => 'required|exists:topik_pengaduan,id',
            'judul_aduan' => 'required|string|max:255',
            'deskripsi_aduan' => 'required|string',
            'kecamatan' => 'nullable|string|max:100',
            'kelurahan' => 'nullable|string|max:100',
            'lokasi_detail' => 'nullable|string|max:255',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $aduan = Aduan::findOrFail($id);
        $aduan->topik_id = $request->topik_id;
        $aduan->judul_aduan = $request->judul_aduan;
        $aduan->deskripsi_aduan = $request->deskripsi_aduan;
        $aduan->kecamatan = $request->kecamatan;
        $aduan->kelurahan = $request->kelurahan;
        $aduan->lokasi_detail = $request->lokasi_detail;

        if ($request->hasFile('lampiran')) {
            $aduan->lampiran = $request->file('lampiran')->store('lampiran', 'public');
        }

        $aduan->save();

        return redirect()->route('warga.status-aduan')->with('success', 'Aduan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $aduan = Aduan::findOrFail($id);
        $aduan->delete();

        return redirect()->route('warga.status-aduan')->with('success', 'Aduan berhasil dihapus.');
    }

    public function show($id)
    {
        $aduan = Aduan::with('responAduan.user')->findOrFail($id); // Eager loading responAduan dan user
        return view('warga.detail-aduan', compact('aduan'));
    }
    
    public function storeResponse(Request $request, $aduan_id)
    {
        // Validasi input
        $request->validate([
            'pesan_respon' => 'required|string',
        ]);

        // Simpan tanggapan ke database
        ResponAduan::create([
            'aduan_id' => $aduan_id,
            'user_id' => auth()->id(), // Ambil ID pengguna yang sedang login
            'pesan_respon' => $request->pesan_respon,
            'tanggal_respon' => now(),
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Tanggapan berhasil dikirim.');
    }
}

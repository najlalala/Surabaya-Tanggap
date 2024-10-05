<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Ensure this is added
use Carbon\Carbon; // Import Carbon class

class WargaController extends Controller
{
    // Halaman Dashboard Warga
    public function dashboard()
    {
        // Misalnya, Anda memiliki model Aduan untuk mengambil data aduan
        $aduans = Aduan::all(); // Ambil semua aduan
        $totalAduan = $aduans->count();
        $aduanDiproses = $aduans->where('status', 'diproses')->count();
        $aduanSelesai = $aduans->where('status', 'selesai')->count();
    
        // Menghitung jumlah aduan berdasarkan bulan
        $aduanCounts = [];
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[] = date("F", mktime(0, 0, 0, $i, 1));
            $aduanCounts[] = $aduans->where('tanggal_pengaduan', '>=', date("Y-$i-01"))
                                     ->where('tanggal_pengaduan', '<=', date("Y-$i-t"))
                                     ->count();
        }
    
        return view('warga.dashboard', compact('totalAduan', 'aduanDiproses', 'aduanSelesai', 'aduans', 'aduanCounts', 'months'));
    }
    

    // Halaman Buat Aduan
    public function buatAduan()
    {
        return view('warga.buat-aduan');
    }

    // Menyimpan Aduan Baru
    public function storeAduan(Request $request)
    {
        $validatedData = $request->validate([
            'topik_id' => 'required',
            'judul_aduan' => 'required',
            'deskripsi_aduan' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'lokasi_detail' => 'required',
            'lampiran' => 'nullable|image|max:2048',
        ]);

        $aduan = new Aduan();
        $aduan->user_id = Auth::id();
        $aduan->topik_id = $validatedData['topik_id']; 
        $aduan->judul_aduan = $validatedData['judul_aduan']; 
        $aduan->deskripsi_aduan = $validatedData['deskripsi_aduan'];
        $aduan->kecamatan = $validatedData['kecamatan']; 
        $aduan->kelurahan = $validatedData['kelurahan']; 
        $aduan->lokasi_detail = $validatedData['lokasi_detail'];
        $aduan->status = 'diproses'; // Default status adalah 'proses'
        $aduan->tanggal_pengaduan = now(); // Menyimpan tanggal saat aduan diinputkan

        // Simpan gambar jika ada
        if ($request->hasFile('lampiran')) {
            $path = $request->file('lampiran')->store('aduan_images', 'public');
            $aduan->lampiran = $path;
        }

        $aduan->save();

        return redirect()->route('warga.status-aduan')->with('success', 'Aduan berhasil dikirim.');
    }

    // Menampilkan Status Aduan
    public function statusAduan()
    {
        $aduans = Aduan::where('user_id', Auth::id())->get();
        return view('warga.status-aduan', compact('aduans'));
    }

    // Halaman Tanggapan Aduan
    public function tanggapanAduan()
    {
        $aduans = Aduan::where('user_id', Auth::id())->whereHas('responAduan')->get();
        return view('warga.tanggapan-aduan', compact('aduans'));
    }

    // Halaman Profil Warga
    public function showProfil()
    {
        $user = auth()->user(); // Ambil data pengguna yang sedang login
        return view('warga.profil', compact('user'));
    }
      

    // Update Profil Warga
    public function updateProfil(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'nik' => 'required|string|max:16',
            'address' => 'required|string|max:255',
        ]);
    
        $user = auth()->user(); // Mengambil data pengguna yang sedang login
    
        // Mengupdate data pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nik = $request->nik;
        $user->address = $request->address;
        $user->save(); // Menyimpan perubahan ke database
    
        return redirect()->route('warga.profil')->with('success', 'Profil berhasil diperbarui.');
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $aduans = Aduan::all();
        return view('admin.dashboard', compact('aduans'));
    }

    public function daftarAduan()
    {
        $aduans = Aduan::where('status', 'diproses')->get();
        return view('admin.daftar-aduan', compact('aduans'));
    }

    public function tanggapiAduan($id)
    {
        $aduan = Aduan::findOrFail($id);
        return view('admin.tanggapi-aduan', compact('aduan'));
    }

    public function storeTanggapan(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tanggapan' => 'required',
        ]);

        $aduan = Aduan::findOrFail($id);
        dd($aduan, $validatedData);

        $tanggapan = new Tanggapan(['tanggapan' => $validatedData['tanggapan']]);
        $aduan->tanggapan()->save($tanggapan);        

        $aduan->status = 'selesai';
        $aduan->save();

        return redirect()->route('admin.daftar-aduan')->with('success', 'Tanggapan berhasil disimpan.');
    }
}
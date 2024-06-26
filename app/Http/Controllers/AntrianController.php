<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Poli;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AntrianController extends Controller {
    public function create() {
        $polis = Poli::all();
        return view('antrian', compact('polis'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:15',
            'poli_id' => 'required|exists:polis,id',
        ]);

        $tanggal = Carbon::now()->toDateString();
        $poli_id = $request->poli_id;

        // Ambil nomor antrian terakhir untuk poli dan tanggal yang sama
        $nomor_antrian_terakhir = Antrian::where('poli_id', $poli_id)
            ->where('tanggal', $tanggal)
            ->max('nomor_antrian');

        // Tambahkan 1 untuk nomor antrian baru
        $nomor_antrian = $nomor_antrian_terakhir ? $nomor_antrian_terakhir + 1 : 1;

        // Simpan data antrian
        Antrian::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'poli_id' => $poli_id,
            'tanggal' => $tanggal,
            'nomor_antrian' => $nomor_antrian,
        ]);

        return redirect()->route('antrian.create');
    }
    public function index() {
        $antrians = Antrian::with('poli')->get();
        return view('admin.antrians', compact('antrians'));
    }

    // Menghapus antrian berdasarkan ID
    public function destroy($id) {
        $antrian = Antrian::findOrFail($id);
        $antrian->delete();

        return redirect()->route('admin.antrians')->with('success', 'Antrian berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    //
    public function index()
    {
        $pemeriksaan = Pemeriksaan::with(['obats'])->get();
        return view('pages.rekam-medis', compact('pemeriksaan'));
    }
    public function create()
    {
        $obat = Obat::all();
        $jadwal=Jadwal::all();

        return view('pages.tambah-rekam-medis', compact('obat','jadwal'),);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required',
            'keluhan'=>'required',
            'catatan'=>'required',
            'obat'=>'required',
            'status'=>'required',
            'jadwal_id'=>'required'
        ]);

        $pemeriksaan = Pemeriksaan::create($validated);
        foreach ($validated['obat'] as $key) {
            DB::table('obat_pemeriksaan')->insert([
                'obat_id' => $key,
                'pemeriksaan_id' => $pemeriksaan->id,
            ]);
        }
        return redirect()->route('rekam-medis')->with('success','Data Berhasil Di simpan');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\User;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    //
    public function index()
    {
        $pemeriksaan = Pemeriksaan::with(['user', 'obats'])->get();
        return view('pages.rekam-medis', compact('pemeriksaan'));
    }
    public function create($id)
    {
        $obat = Obat::all();
        $rekamMedis =Pemeriksaan::find($id);
        return view('pages.tambah-rekam-medis', compact('rekamMedis', 'obat'),);
    }
    public function store(Request $request,$id)
    {
        $validated = $request->validate([
            // 'user_id'=>'required|numeric',
            // 'keluhan'=>'required',
            'catatan'=>'required',
            'obat'=>'required',
            'status'=>'required'
        ]);
        $pemeriksaan = Pemeriksaan::find($id)->update($validated);
        foreach ($validated['obat'] as $key) {
            DB::table('obat_pemeriksaan')->insert([
                'obat_id' => $key,
                'pemeriksaan_id' => $id,
            ]);
        }
        return redirect()->route('rekam-medis')->with('success','Data Berhasil Di simpan');

    }
}

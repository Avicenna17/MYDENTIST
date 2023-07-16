<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('pages.jadwal',compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.tambah-jadwal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'tanggal'=>'required',
            'sesi_awal'=>'required',
            'sesi_akhir'=>'required',
            'max_pasien'=>'required',
        ]);
        Jadwal::create($validated);
        return redirect()->route('jadwal.index')->with('success','Data Berhasil Di simpan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($jadwal)
    {
        $jadwal = Jadwal::find($jadwal);
        return view('pages.update-jadwal',compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $jadwal)
    {
        $validated = $request->validate([
            'tanggal'=>'required',
            'sesi_awal'=>'required',
            'sesi_akhir'=>'required',
            'max_pasien'=>'required',
        ]);
        Jadwal::find($jadwal)->update($validated);
        return redirect()->route('jadwal.index')->with('success','Data Berhasil Di ubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}

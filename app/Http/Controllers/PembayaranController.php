<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pemeriksaan = Pemeriksaan::with(['user', 'obats'])->get();
        return view('pages.pembayaran', compact('pemeriksaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $pemeriksaan = Pemeriksaan::find($id);
        return view('pages.buat-pembayaran', compact('pemeriksaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'total_bayar' => 'required',
            'metode' => 'required',
            'bukti_bayar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure 'bukti_bayar' is an image file
        ]);
        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('bukti-bayar'), $fileName);

            $validated['bukti_bayar'] = 'bukti-bayar/' . $fileName;
        }
        $validated['status'] = 'terbayar';
        $validated['pemeriksaan_id'] = $id;
        // Insert the payment details into the Pembayaran model
        Pembayaran::create($validated);

        // Perform any other actions you need to do after saving the payment

        // Redirect or return a response as needed
        return redirect()->route('bayar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($pembayaran)
    {
        $pemeriksaan = Pemeriksaan::find($pembayaran);
        return view('pages.lihat-pembayaran', compact('pemeriksaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}

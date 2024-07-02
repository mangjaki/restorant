<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservasi = Reservasi::all();
        return view('reservasi.index')
                ->with('reservasi', $reservasi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:40',
            'no_meja' => 'required|max:40',
            'tanggal_waktu' => 'required|date',
            'jumlah_orang' => 'required|max:10',
        ]);
        Reservasi::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'no_meja' => $request->no_meja,
            'tanggal_waktu' => $request->tanggal_waktu,
            'jumlah_orang' => $request->jumlah_orang,
            'status' => 'pending',
        ]);
        return redirect()->route('reservasi.index')->with('success','Reservasi berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('reservasi.show', compact('reservasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('reservasi.edit', compact('reservasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nama' => 'required|max:40',
            'no_meja' => 'required|max:40',
            'tanggal_waktu' => 'required|date',
            'jumlah_orang' => 'required|max:10',
        ]);

        $reservation = Reservasi::findOrFail($id);
        $reservation->update([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'no_meja' => $request->no_meja,
            'tanggal_waktu' => $request->tanggal_waktu,
            'jumlah_orang' => $request->jumlah_orang,
            'status' => $request->status,
        ]);

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dihapus.');
    }
}

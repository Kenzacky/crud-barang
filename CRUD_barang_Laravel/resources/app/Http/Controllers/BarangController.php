<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Untuk upload file

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::latest()->paginate(10); // Menampilkan 10 barang per halaman
        return view('barangs.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barangs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|max:255',
            'deskripsi' => 'nullable',
            'harga_satuan' => 'required|numeric|min:0',
            'jumlah' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/fotos');
            $fotoPath = Storage::url($fotoPath); // Dapatkan URL yang bisa diakses publik
        }

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'harga_satuan' => $request->harga_satuan,
            'jumlah' => $request->jumlah,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('barangs.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barangs.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required|max:255',
            'deskripsi' => 'nullable',
            'harga_satuan' => 'required|numeric|min:0',
            'jumlah' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = $barang->foto; // Tetap gunakan foto yang lama jika tidak ada upload baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($barang->foto) {
                Storage::delete(str_replace('/storage/', 'public/', $barang->foto));
            }
            $fotoPath = $request->file('foto')->store('public/fotos');
            $fotoPath = Storage::url($fotoPath);
        }

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'harga_satuan' => $request->harga_satuan,
            'jumlah' => $request->jumlah,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        if ($barang->foto) {
            Storage::delete(str_replace('/storage/', 'public/', $barang->foto));
        }
        $barang->delete();

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus!');
    }
}
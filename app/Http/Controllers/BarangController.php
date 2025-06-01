<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pembelian;


class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::with('kategori')
            ->where('status', 'tersedia')
            ->where('user_id', '!=', Auth::id());

        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }


        if ($request->filled('q')) {
            $query->where('nama', 'like', '%' . $request->q . '%');
        }

        $barangs = $query->latest()->paginate(12);
        $kategoris = Kategori::all();

        return view('barangs.index', compact('barangs', 'kategoris'));
    }

    
    public function show($id)
    {
        $barang = Barang::with('kategori')->findOrFail($id);
        $kategoris = Kategori::all();
        return view('barangs.show', compact('barang', 'kategoris'));
    }

    public function jual()
    {
        $barangs = Barang::where('user_id', Auth::id())->get();
        $kategoris = Kategori::all();
        return view('barangs.jual', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('barangs.create', compact('kategoris'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storeAs('uploads', $filename, 'public');
            $gambarPath = $filename; 
        }

        Barang::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'user_id' => Auth::id(),
            'status' => 'tersedia',
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('barangs.jual')->with('success', 'Barang berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all(); // jika butuh kategori
        return view('barangs.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:tersedia,terjual',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($barang->gambar) {
                Storage::delete('public/' . $barang->gambar);
            }
            $barang->gambar = $request->file('gambar')->store('uploads', 'public');
        }

        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->deskripsi = $request->deskripsi;
        $barang->status = $request->status;
        $barang->save();

        return redirect()->route('barangs.jual')->with('success', 'Barang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        if ($barang->gambar) {
            Storage::delete('public/' . $barang->gambar);
        }
        $barang->delete();
        return redirect()->route('barangs.jual')->with('success', 'Barang berhasil dihapus!');
    }

    public function manage()
    {
        // Jika belum ada middleware admin, cek role di sini:
        if (auth::user()->role !== 'admin') {
            abort(403);
        }

        $barangs = Barang::all();
        return view('barangs.manage', compact('barangs'));
    }
}

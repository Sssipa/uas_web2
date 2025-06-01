<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Pembelian;
use App\Models\Barang;
use App\Models\DetailPembelian;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::with('barang')->where('user_id', Auth::id())->get();
        return view('checkout.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Jika ada barang_id, proses Buy Now satu barang
        if ($request->filled('barang_id')) {
            $barang = Barang::findOrFail($request->barang_id);

            if ($barang->status === 'terjual') {
                return back()->with('error', 'Barang sudah terjual!');
            }

            DB::transaction(function () use ($user, $barang) {
                $kode = 'TRX-' . strtoupper(Str::random(6));

                $pembelian = Pembelian::create([
                    'user_id' => $user->id,
                    'kode_transaksi' => $kode,
                    'total' => $barang->harga,
                ]);

                DetailPembelian::create([
                    'pembelian_id' => $pembelian->id,
                    'barang_id' => $barang->id,
                    'harga' => $barang->harga,
                ]);

                $barang->update(['status' => 'terjual']);

                // Hapus dari cart jika ada
                Cart::where('user_id', $user->id)->where('barang_id', $barang->id)->delete();
            });

            return redirect()->route('barangs.index')->with('success', 'Barang berhasil dibeli!');
        }

        // Jika tidak ada barang_id, proses semua cart (checkout banyak barang)
        $carts = Cart::with('barang')->where('user_id', $user->id)->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Keranjang kosong!');
        }

        DB::transaction(function () use ($user, $carts) {
            $kode = 'TRX-' . strtoupper(Str::random(6));
            $total = $carts->sum(fn($cart) => $cart->barang->harga);

            $pembelian = Pembelian::create([
                'user_id' => $user->id,
                'kode_transaksi' => $kode,
                'total' => $total,
            ]);

            foreach ($carts as $cart) {
                DetailPembelian::create([
                    'pembelian_id' => $pembelian->id,
                    'barang_id' => $cart->barang->id,
                    'harga' => $cart->barang->harga,
                ]);
                $cart->barang->update(['status' => 'terjual']);
            }

            Cart::where('user_id', $user->id)->delete();
        });

        return redirect()->route('barangs.index')->with('success', 'Pembelian berhasil!');
    }
}

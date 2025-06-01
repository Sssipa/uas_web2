<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Barang;


class CartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'qty' => 'nullable|integer|min:1'
        ]);

        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::id(), 'barang_id' => $request->barang_id],
            ['qty' => $request->qty ?? 1]
        );

        if (!$cart->wasRecentlyCreated) {
            $cart->qty += $request->qty ?? 1;
            $cart->save();
        }

        return redirect()->route('carts.index')->with('success', 'Barang ditambahkan ke cart!');
    }

    public function index()
    {
        $barangs = Barang::all();
        $carts = Cart::with('barang')->where('user_id', Auth::id())->get();
        return view('carts.index', compact('carts'));
    }

    public function destroy($id)
    {
        $cart = Cart::where('user_id', Auth::id())->where('id', $id)->first();

        if ($cart) {
            $cart->delete();
            return redirect()->route('carts.index')->with('success', 'Barang berhasil dihapus dari cart!');
        }

        return redirect()->route('carts.index')->withErrors(['error' => 'Barang tidak ditemukan di cart!']);
    }
}

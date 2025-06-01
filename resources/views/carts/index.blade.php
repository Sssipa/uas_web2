<x-default-layout title="Cart">
    <div class="max-w-4xl mx-auto py-10 px-4">
        <h2 class="text-3xl font-bold mb-8 text-gray-800">Keranjang Belanja</h2>

        @forelse($carts as $cart)
            <div class="flex items-center gap-4 border rounded-xl p-4 shadow-sm mb-4 bg-white hover:shadow-md transition">
                <!-- Gambar -->
                @if($cart->barang->gambar)
                    <img src="{{ asset('storage/uploads/' . $cart->barang->gambar) }}" alt="{{ $cart->barang->nama }}"
                        class="w-24 h-24 object-cover rounded-lg">
                @else
                    <img src="https://via.placeholder.com/100x100?text=No+Image" class="w-24 h-24 object-cover rounded-lg" alt="No Image">
                @endif

                <!-- Info Produk -->
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $cart->barang->nama }}</h3>
                    <p class="text-gray-600 text-sm">Rp{{ number_format($cart->barang->harga, 0, ',', '.') }}</p>
                </div>

                <!-- Tombol Hapus -->
                <form action="{{ route('carts.destroy', $cart->id) }}" method="POST" onsubmit="return confirm('Hapus item ini dari keranjang?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-red-600 hover:text-red-800 text-sm font-medium">
                        Hapus
                    </button>
                </form>
            </div>
        @empty
            <div class="text-gray-500 text-center py-16">
                <p class="text-lg">Keranjangmu masih kosong</p>
                <a href="{{ route('barangs.index') }}"
                    class="mt-4 inline-block bg-black text-white px-5 py-2 rounded-xl text-sm hover:bg-gray-900 transition">
                    Cari Barang
                </a>
            </div>
        @endforelse

        @if($carts->count())
            <div class="mt-8 text-right">
                <p class="text-lg font-semibold text-gray-700">
                    Total: Rp{{ number_format($carts->sum(fn($cart) => $cart->barang->harga), 0, ',', '.') }}
                </p>
                <form action="{{ route('checkout.store') }}" method="POST" class="inline-block mt-3">
                    @csrf
                    <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded-xl hover:bg-green-700 transition">
                        Checkout
                    </button>
                </form>
            </div>
        @endif
    </div>
</x-default-layout>

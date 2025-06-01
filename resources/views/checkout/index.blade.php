<x-default-layout title="Checkout">
    <div class="max-w-4xl mx-auto py-10 px-4">
        <h2 class="text-2xl font-bold mb-6">Konfirmasi Pembelian</h2>

        @forelse($carts as $cart)
            <div class="flex justify-between border-b py-4">
                <div>
                    <div class="font-semibold">{{ $cart->barang->nama }}</div>
                    <div class="text-sm text-gray-500">Jumlah: {{ $cart->qty }}</div>
                </div>
                <div>
                    Rp{{ number_format($cart->barang->harga * $cart->qty, 0, ',', '.') }}
                </div>
            </div>
        @empty
            <p class="text-gray-500">Keranjang kosong.</p>
        @endforelse

        @if($carts->count())
            <div class="text-right mt-6">
                <form action="{{ route('checkout.store') }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit"
                        class="w-full bg-black text-white py-3 rounded-xl font-semibold hover:bg-gray-900 transition duration-200 flex items-center justify-center">
                        🛒 Buy Now
                    </button>
                </form>
            </div>
        @endif
    </div>
</x-default-layout>

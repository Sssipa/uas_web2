<x-default-layout title="Detail Barang" section_description="Lihat detail produk pilihanmu">
    <div class="bg-white py-16">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Gambar Produk -->
            <div class="flex justify-center items-start">
                <img src="{{ asset('storage/uploads/' . $barang->gambar) }}"
                    alt="{{ $barang->nama }}"
                    class="rounded-2xl w-full max-h-[32rem] aspect-square object-cover shadow-xl" />
            </div>

            <!-- Detail Produk -->
            <div class="flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="inline-block bg-yellow-100 text-yellow-800 text-xs font-medium px-3 py-1 rounded-full">
                        {{ $barang->kategori->name ?? 'Tanpa Kategori' }}
                    </span>

                    <h1 class="text-4xl font-bold text-gray-900">{{ $barang->nama }}</h1>

                    <p class="text-2xl font-semibold text-black">Rp{{ number_format($barang->harga, 0, ',', '.') }}</p>

                    <div class="mt-4 text-base text-gray-700 leading-relaxed whitespace-pre-line">
                        {!! nl2br(e($barang->deskripsi)) !!}
                    </div>

                    <!-- Tombol aksi -->
                    <div class="flex gap-3 mt-6">
                        @if(Auth::user() && Auth::user()->role === 'admin')
                        @elseif(Auth::id() === $barang->user_id)
                            <a href="{{ route('barangs.edit', $barang->id) }}"
                                class="flex-1 bg-black text-white py-3 px-6 rounded-xl font-semibold hover:bg-gray-900 transition duration-200 text-center flex items-center justify-center">
                                Edit
                            </a>
                            <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus barang ini?')"
                                    class="w-full bg-red-600 text-white py-3 px-6 rounded-xl font-semibold hover:bg-red-700 transition duration-200 flex items-center justify-center">
                                    DELETE
                                </button>
                            </form>
                        @else
                            <form action="{{ route('checkout.store') }}" method="POST" class="flex-1">
                                @csrf
                                <input type="hidden" name="barang_id" value="{{ $barang->id }}">
                                <button type="submit"
                                    class="w-full bg-black text-white py-3 rounded-xl font-semibold hover:bg-gray-900 transition duration-200 flex items-center justify-center">
                                    🛒 Buy Now
                                </button>
                            </form>
                            <form action="{{ route('carts.store') }}" method="POST" class="flex-1">
                                @csrf
                                <input type="hidden" name="barang_id" value="{{ $barang->id }}">
                                <button type="submit" 
                                    class="w-full border border-gray-300 py-3 rounded-xl font-semibold text-gray-800 hover:bg-gray-100 transition duration-200 flex items-center justify-center">
                                    ➕ Add to Cart
                                </button>
                            </form>
                        
                        @endif
                    </div>

                    <!-- Info penjual dan waktu -->
                    <div class="mt-6 text-sm text-gray-600">
                        <p><span class="text-gray-500">Sold by:</span> <span class="font-semibold">{{ $barang->user->name ?? 'Penjual' }}</span></p>
                        <p class="text-xs text-gray-400">Posted {{ $barang->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                <!-- Tombol Kembali -->
                <div class="mt-10">
                    @if(Auth::user() && Auth::user()->role === 'admin')
                        <a href="{{ route('barangs.manage') }}"
                            class="inline-block px-5 py-2 text-sm bg-black text-white rounded-xl hover:bg-gray-900 transition duration-200">
                            ← Back to Manage Items
                        </a>
                    @else
                        <a href="{{ route('barangs.jual') }}"
                            class="inline-block px-5 py-2 text-sm bg-black text-white rounded-xl hover:bg-gray-900 transition duration-200">
                            ← Back to Sell
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-default-layout>

<x-default-layout title="Items" section_title="SecondHand Deals" section_description="Browse deals of items">
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-16 lg:max-w-7xl lg:px-8">

            {{-- Tombol Tambah Barang --}}
            <div class="flex justify-end mb-8">
                <a href="{{ route('barangs.create') }}"
                class="inline-block bg-black hover:bg-gray-600 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
                    + Add Items
                </a>
            </div>

            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @foreach($barangs as $barang)
                    <a href="{{ route('barangs.show', $barang->id) }}" class="group relative">
                        <img src="{{ asset('storage/uploads/' . $barang->gambar) }}"
                            alt="{{ $barang->nama }}"
                            class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:scale-105 transition-transform duration-300">
                        {{-- Label Milik Anda --}}
                        <span class="absolute top-2 left-2 bg-yellow-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                            Yours
                        </span>
                        <h3 class="mt-4 text-sm text-gray-700">{{ $barang->nama }}</h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">Rp{{ number_format($barang->harga, 0, ',', '.') }}</p>
                    </a>
                @endforeach
            </div>

        </div>
    </div>
</x-default-layout>

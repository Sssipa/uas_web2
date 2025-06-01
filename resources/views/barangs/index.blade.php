<x-default-layout title="Items" section_title="SecondHand Deals" section_description="Browse deals of items">
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-16 lg:max-w-7xl lg:px-8">

            <div class="mb-4">
                <form action="{{ route('barangs.index') }}" method="GET" class="flex items-center gap-2">
                    <label for="kategori" class="text-sm font-medium text-gray-700">Filter by Category:</label>
                    <select name="kategori" id="kategori" onchange="this.form.submit()" class="rounded border-gray-300 text-gray-700">
                        <option value="">All</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @foreach($barangs as $barang)
                    <a href="{{ route('barangs.show', $barang->id) }}" class="group">
                        <img src="{{ asset('storage/uploads/' . $barang->gambar) }}"
                            alt="{{ $barang->nama }}"
                            class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:scale-105 transition-transform duration-300">
                        <h3 class="mt-4 text-sm text-gray-700">{{ $barang->nama }}</h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">Rp{{ number_format($barang->harga, 0, ',', '.') }}</p>
                    </a>
                @endforeach
            </div>

        </div>
    </div>
</x-default-layout>

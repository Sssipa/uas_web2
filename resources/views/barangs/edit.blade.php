<x-default-layout title="Edit Barang">
    <div class="bg-white py-16">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Preview Gambar -->
            <div class="flex flex-col items-center justify-start">
                @if ($barang->gambar)
                    <img src="{{ asset('storage/uploads/' . $barang->gambar) }}"
                        alt="{{ $barang->nama }}"
                        class="rounded-2xl w-full max-h-[32rem] aspect-square object-cover shadow-xl mb-6" />
                @else
                    <div class="w-full h-[24rem] bg-gray-100 rounded-2xl flex items-center justify-center text-gray-400">
                        Tidak ada gambar
                    </div>
                @endif
            </div>
            <!-- Form Edit -->
            <div>
                <h2 class="mb-6 text-3xl font-bold text-gray-900">Edit Item</h2>
                <form action="{{ route('barangs.update', $barang->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nama" class="block font-semibold mb-1">Nama Barang</label>
                        <input type="text" id="nama" name="nama" value="{{ $barang->nama }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-rose-400" required>
                    </div>

                    <div>
                        <label for="harga" class="block font-semibold mb-1">Harga</label>
                        <input type="number" id="harga" name="harga" step="0.01" value="{{ $barang->harga }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-rose-400" required>
                    </div>

                    <div>
                        <label for="deskripsi" class="block font-semibold mb-1">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="3"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-rose-400">{{ $barang->deskripsi }}</textarea>
                    </div>

                    <div>
                        <label for="status" class="block font-semibold mb-1">Status</label>
                        <select id="status" name="status"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-rose-400">
                            <option value="tersedia" {{ $barang->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="terjual" {{ $barang->status == 'terjual' ? 'selected' : '' }}>Terjual</option>
                        </select>
                    </div>

                    <div>
                        <label for="gambar" class="block font-semibold mb-1">Ganti Gambar (opsional)</label>
                        <input type="file" id="gambar" name="gambar" accept="image/*"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="flex-1 bg-black hover:bg-gray-900 text-white font-semibold py-3 rounded-xl shadow transition">
                            Update Item
                        </button>
                        <a href="{{ route('barangs.show', $barang->id) }}" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 rounded-xl text-center transition">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-default-layout>

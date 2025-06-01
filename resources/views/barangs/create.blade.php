<x-default-layout title="Tambah Barang">
    <div class="max-w-xl mx-auto py-10">
        <h2 class="text-2xl font-bold mb-6">Add Items</h2>
        <form action="{{ route('barangs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="nama" class="block font-semibold mb-1">Nama Barang</label>
                <input type="text" id="nama" name="nama" class="w-full border rounded px-4 py-2" required>
            </div>

            <div>
                <label for="harga" class="block font-semibold mb-1">Harga</label>
                <input type="number" id="harga" name="harga" class="w-full border rounded px-4 py-2" required>
            </div>

            <div>
                <label for="deskripsi" class="block font-semibold mb-1">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="3" class="w-full border rounded px-4 py-2"></textarea>
            </div>

            <div>
                <label for="kategori_id" class="block font-semibold mb-1">Kategori</label>
                <select id="kategori_id" name="kategori_id" class="w-full border rounded px-4 py-2" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="gambar" class="block font-semibold mb-1">Gambar (opsional)</label>
                <input type="file" id="gambar" name="gambar" accept="image/*" class="w-full border rounded px-4 py-2">
            </div>

            <div class="flex gap-3">
                <button type="submit" class="flex-1 bg-black hover:bg-gray-900 text-white font-semibold py-3 rounded-xl shadow transition">
                    Simpan
                </button>
                <a href="{{ route('barangs.jual') }}" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 rounded-xl text-center transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-default-layout>

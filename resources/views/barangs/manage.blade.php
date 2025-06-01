{{-- filepath: d:\Kuliah\Semester 4\PRAKTIKUM\Coding\WEB II\project-web2\resources\views\barangs\manage.blade.php --}}
<x-default-layout title="Kelola Barang">
    <div class="max-w-7xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6">Manage Items</h1>
        <div class="bg-white rounded-md overflow-x-auto">
            <table class="w-full text-sm text-left text-black">
                <thead>
                    <tr>
                        <th class="px-5 py-3">Gambar</th>
                        <th class="px-5 py-3">Nama</th>
                        <th class="px-5 py-3">Harga</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3">Pemilik</th>
                        <th class="px-5 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $barang)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-3">
                                @if($barang->gambar)
                                    <img src="{{ asset('storage/uploads/' . $barang->gambar) }}"
                                        alt="{{ $barang->nama }}"
                                        class="w-16 h-16 object-cover rounded">
                                @else
                                    <span class="text-gray-400 italic">No Image</span>
                                @endif
                            </td>
                            <td class="px-5 py-3">
                                {{ $barang->nama }}
                            </td>
                            <td class="px-5 py-3">
                                Rp{{ number_format($barang->harga, 0, ',', '.') }}
                            </td>
                            <td class="px-5 py-3">
                                {{ ucfirst($barang->status) }}
                            </td>
                            <td class="px-5 py-3">
                                {{ $barang->user->name ?? '-' }}
                            </td>
                            <td class="px-5 py-3 text-center space-x-2">
                                <a href="{{ route('barangs.show', $barang->id) }}"
                                class="text-blue-700 hover:underline text-sm">
                                    Detail
                                </a>
                                <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST"
                                    class="inline" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:underline text-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-4 text-center text-gray-500 italic">
                                Tidak ada barang yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-default-layout>
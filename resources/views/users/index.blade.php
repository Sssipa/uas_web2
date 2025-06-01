<x-default-layout title="Kelola User">
    <div class="max-w-7xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6">Manage User</h1>
        <div class="bg-white rounded-md overflow-x-auto">
            <table class="w-full text-sm text-left text-black">
                <thead>
                    <tr>
                        <th class="px-5 py-3">Profil</th>
                        <th class="px-5 py-3">Nama</th>
                        <th class="px-5 py-3">Email</th>
                        <th class="px-5 py-3">Role</th>
                        <th class="px-5 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        @if($user->role !== 'admin')
                        <tr>
                            <td class="px-5 py-3">
                                @if($user->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}"
                                         alt="{{ $user->name }}"
                                         class="w-10 h-10 rounded-full object-cover">
                                @else
                                    <span class="inline-block w-10 h-10 rounded-full bg-gray-200 text-gray-500 items-center justify-center">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-3">{{ $user->name }}</td>
                            <td class="px-5 py-3">{{ $user->email }}</td>
                            <td class="px-5 py-3">{{ $user->role }}</td>
                            <td class="px-5 py-3 text-center">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-4 text-center text-gray-500 italic">
                                Tidak ada user.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-default-layout>
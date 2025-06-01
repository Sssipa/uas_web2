{{-- filepath: resources/views/dashboard.blade.php --}}
<x-default-layout title="Dashboard">
    <div class="max-w-5xl mx-auto py-12 px-4">
        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold mb-2">Total Items</h2>
                <p class="text-2xl font-bold text-rose-600">{{ \App\Models\Barang::count() }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold mb-2">Total Users</h2>
                <p class="text-2xl font-bold text-rose-600">{{ \App\Models\User::count() }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold mb-2">Total Sold</h2>
                <p class="text-2xl font-bold text-rose-600">{{ \App\Models\Barang::where('status', 'terjual')->count() }}</p>
            </div>
        </div>
        <div class="mt-10">
            <p class="text-gray-600">Welcome, <span class="font-semibold">{{ Auth::user()->name }}</span>!</p>
        </div>
    </div>
</x-default-layout>
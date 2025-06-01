<x-default-layout title="Profile">
    <div class="flex flex-col md:flex-row gap-6 pt-20">

        <!-- Sidebar Kiri -->
        <div class="md:w-1/3 bg-white p-6 border border-gray-200 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Profile Summary</h2>
            <div class="space-y-4">
                <div>
                    <p class="text-xs font-medium text-gray-600">Name</p>
                    <p class="text-base font-semibold text-gray-800">{{ $user->name }}</p>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-600">Email</p>
                    <p class="text-base font-semibold text-gray-800">{{ $user->email }}</p>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-600">Role</p>
                    <p class="text-base font-semibold text-gray-800">{{ $user->role }}</p>
                </div>

                @if($user->avatar)
                    <div class="mt-6 flex justify-center">
                        <img src="{{ asset('storage/' . $user->avatar) }}"
                             class="w-24 h-24 rounded-full border border-gray-300 shadow-sm object-cover"
                             alt="User Avatar">
                    </div>
                @endif
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 bg-white p-8 border border-gray-200 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold text-gray-700 mb-6">Update Your Profile</h2>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                        class="mt-2 block w-full rounded-md border border-gray-300 focus:ring-rose-400 focus:border-rose-400 shadow-sm p-3"
                        required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                        class="mt-2 block w-full rounded-md border border-gray-300 focus:ring-rose-400 focus:border-rose-400 shadow-sm p-3"
                        required>
                </div>

                <div>
                    <label for="avatar" class="block text-sm font-medium text-gray-700">Avatar</label>
                    <input type="file" name="avatar" id="avatar"
                        class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100 cursor-pointer">
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center rounded-md bg-rose-500 px-6 py-3 text-sm font-semibold text-white shadow-md hover:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-400 focus:ring-offset-2 transition-colors">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-default-layout>

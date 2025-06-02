@props(['title'])

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="stylesheet" type="text/css" 
            href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
        <title>{{ $title }}</title>
    </head>

    <body class="flex flex-col min-h-screen">
        <header>
                <nav class="bg-white" x-data="{ mobileOpen: false, profileOpen: false }">
                    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                        <div class="relative flex h-16 items-center justify-between">
                            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                                <!-- Mobile menu button-->
                                <button type="button" @click="mobileOpen = !mobileOpen" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-800 hover:bg-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
                                    <span class="absolute -inset-0.5"></span>
                                    <span class="sr-only">Open main menu</span>
                                    <svg :class="{'hidden': mobileOpen, 'block': !mobileOpen }" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                    <svg :class="{'block': mobileOpen, 'hidden': !mobileOpen }" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                                <div class="hidden sm:ml-6 sm:block">
                                    <div class="flex space-x-4">
                                        @auth
                                            @can('admin')
                                                <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
                                                <x-nav-link href="/manage-items" :active="request()->is('manage-items')">Manage Items</x-nav-link>
                                                <x-nav-link href="/manage-users" :active="request()->is('manage-users')">Users</x-nav-link>
                                            @else
                                                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                                                <x-nav-link href="/beli" :active="request()->is('beli')">Items</x-nav-link>
                                                <x-nav-link href="/jual" :active="request()->is('jual')">Sell</x-nav-link>
                                                <x-nav-link href="/cart" :active="request()->is('cart')">Cart</x-nav-link>
                                            @endcan
                                        @endauth
                                        @guest
                                            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                                            <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
                                            <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                                        @endguest
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                                <div class="flex shrink-0 items-center">
                                    <p class="rounded-md text-3xl font-bold  text-black ">SecondChange</p>
                                </div>
                            </div>
                            <div class="hidden sm:ml-6 sm:block">
                                <form action="/beli" method="GET" class="ml-4">
                                    <input type="text" name="q" placeholder="Search..."
                                        class="rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm text-gray-900 placeholder-gray-400 focus:border-black focus:ring-black focus:outline-none" />
                                </form>
                            </div>
                            <div class="absolute inset-y-0 right-0 items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 hidden sm:flex">
                                <!-- Profile dropdown -->
                                <div class="relative ml-3">
                                    <div>
                                        <button type="button" @click="profileOpen = !profileOpen" class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                            <span class="absolute -inset-1.5"></span>
                                            <span class="sr-only">Open user menu</span>
                                            @auth
                                                <img class="size-8 rounded-full"
                                                src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' }}"
                                                alt="User Avatar">
                                            @endauth
                                        </button>
                                    </div>
                                    <div x-show="profileOpen"
                                        @click.away="profileOpen = false"
                                        x-transition:enter="transition ease-out duration-100 transform"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75 transform"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="opacity-0 scale-95" 
                                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    @auth
                                        <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                        <form action="{{ route('auth.logout') }}" method="POST" class="block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700">Sign out</button>
                                        </form>
                                    @endauth
                                    @guest
                                        <a href="/login" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Login</a>
                                        <a href="/register" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Register</a>
                                    @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile menu, show/hide based on menu state. -->
                    <div x-show="mobileOpen" class="sm:hidden" id="mobile-menu">
                        <div class="space-y-1 px-2 pt-2 pb-3">
                            @auth
                                @can('admin')
                                    <x-mobile-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-mobile-nav-link>
                                    <x-mobile-nav-link href="/manage-items" :active="request()->is('manage-items')">Manage Items</x-mobile-nav-link>
                                    <x-mobile-nav-link href="/manage-users" :active="request()->is('manage-usersc')">Users</x-mobile-nav-link>
                                @else
                                    <x-mobile-nav-link href="/" :active="request()->is('/')">Home</x-mobile-nav-link>
                                    <x-mobile-nav-link href="/beli" :active="request()->is('beli')">Items</x-mobile-nav-link>
                                    <x-mobile-nav-link href="/jual" :active="request()->is('jual')">Sell</x-mobile-nav-link>
                                    <x-mobile-nav-link href="/cart" :active="request()->is('cart')">Cart</x-mobile-nav-link>
                                @endcan
                            @endauth
                            @guest
                                <x-mobile-nav-link href="/" :active="request()->is('/')">Home</x-mobile-nav-link>
                                <x-mobile-nav-link href="/login" :active="request()->is('login')">Login</x-mobile-nav-link>
                                <x-mobile-nav-link href="/register" :active="request()->is('register')">Register</x-mobile-nav-link>
                            @endguest
                            @auth
                                <div class="border-t border-gray-200 mt-2 pt-2">
                                    <div class="items-center space-x-3 px-3 flex sm:hidden flex-col">
                                        @auth
                                            <img class="size-8 rounded-full"
                                                src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' }}"
                                                alt="User Avatar">
                                        <span class="font-medium text-gray-900">{{ Auth::user()->name }}</span>
                                        @endauth
                                    </div>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700">Settings</a>
                                    <form action="{{ route('auth.logout') }}" method="POST" class="block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700">Sign out</button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                </nav>
            </header>
        <main class="flex-1">
                {{ $slot }}
        </main>
        <x-footer />
    </body>
</html>

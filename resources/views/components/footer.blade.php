@auth
    @if(auth()->user()->role === 'admin')
        {{-- Footer untuk Admin --}}
        <footer class="bg-black text-white">
            <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8 text-sm">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <span class="text-base font-medium">
                        Admin | @yield('page_title', 'Dashboard')
                    </span>
                    <span class="text-xs text-gray-400">© {{ date('Y') }} SecondChance. All rights reserved.</span>
                </div>
            </div>
        </footer>
    @else
        {{-- Footer untuk User --}}
        <footer class="bg-white border-t border-gray-200">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-sm text-gray-700">
                    <!-- Kolom Kiri: Logo & Deskripsi -->
                    <div>
                        <h2 class="text-2xl font-bold text-black mb-4">SecondChance</h2>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            SecondChance adalah platform jual beli barang bekas berkualitas.
                            Temukan, jual, dan beli barang dengan mudah, aman, dan nyaman.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" aria-label="Instagram" class="hover:opacity-80">
                                <img src="/images/ig.png" alt="Instagram" class="h-6 w-6">
                            </a>
                            <a href="#" aria-label="GitHub" class="hover:opacity-80">
                                <img src="/images/github.png" alt="GitHub" class="h-6 w-6">
                            </a>
                            <a href="#" aria-label="Twitter" class="hover:opacity-80">
                                <img src="/images/x.png" alt="Twitter" class="h-6 w-6">
                            </a>
                        </div>
                    </div>

                    <!-- Spacer Tengah (opsional) -->
                    <div class="hidden md:block"></div>

                    <!-- Kolom Kanan: Navigasi & Kategori -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-6">Navigasi</h4>
                            <ul class="space-y-2 gap-6 text-gray-600">
                                <li><a href="{{ route('home') }}" class="hover:text-rose-600">Home</a></li>
                                <li><a href="{{ route('barangs.index') }}" class="hover:text-rose-600">Items</a></li>
                                <li><a href="{{ route('barangs.jual') }}" class="hover:text-rose-600">Sell</a></li>
                                <li><a href="{{ route('carts.index') }}" class="hover:text-rose-600">Cart</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-6">Kategori</h4>
                            <ul class="space-y-2 gap-6 text-gray-600">
                                @foreach($kategoris as $kategori)
                                    <li>
                                        <a href="{{ route('barangs.index', ['kategori' => $kategori->id]) }}" class="hover:text-rose-600">
                                            {{ $kategori->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="border-t border-gray-100 mt-12 pt-6 text-xs text-gray-400 text-center">
                    © {{ date('Y') }} SecondChance. All rights reserved.
                </div>
            </div>
        </footer>
    @endif
@else
    {{-- Footer untuk Pengunjung (Guest) --}}
    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8 text-center text-sm text-gray-600">
            <p class="mb-4">SecondChance adalah platform jual beli barang bekas terpercaya.</p>
            <p>© {{ date('Y') }} SecondChance. All rights reserved.</p>
        </div>
    </footer>
@endauth

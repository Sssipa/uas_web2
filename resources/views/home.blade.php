<x-default-layout title="Home">
    <section class="relative h-120 flex items-center justify-center bg-gray-100">
        <div class="absolute inset-0">
            <img src="{{ asset('images/hero-1.jpg') }}" alt="Jual Beli Barang Bekas"
                class="w-full h-full object-cover" />
        </div>
        <div class="relative z-10 flex flex-col items-center justify-center px-6 py-20">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight text-center drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)]">
                Aplikasi jual beli<br />
                barang bekas
            </h1>
        </div>
        <div class="absolute inset-0 bg-black/15 rounded-none"></div>
    </section>
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-2xl md:text-3xl font-bold mb-12">
                Jual barang bekas online
            </h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Langkah 1 -->
                <div>
                    <img src="{{ asset('images/upload.jpg') }}" alt="Upload Produk" class="w-100 h-55 object-cover rounded-lg mb-4 mx-auto" />
                    <h3 class="text-lg font-semibold mb-2">1. Upload produk</h3>
                    <p>Foto barang yang akan di jual, deskripsikan, dan tentukan harganya</p>
                </div>

                <!-- Langkah 2 -->
                <div>
                    <img src="{{ asset('images/shipping.jpg') }}" alt="Jual dan Kirim" class="100 h-55 object-cover rounded-lg mb-4 mx-auto" />
                    <h3 class="text-lg font-semibold mb-2">2. Jual dan kirim</h3>
                    <p>Barangmu terjual! cetak label pengiriman dan tunggu kurir menjemput.</p>
                </div>

                <!-- Langkah 3 -->
                <div>
                    <img src="{{ asset('images/payment.jpg') }}" alt="Make it rain" class="w-100 h-55 object-cover rounded-lg mb-4 mx-auto" />
                    <h3 class="text-lg font-semibold mb-2">3. Make it rain</h3>
                    <p>Kamu akan langsung di bayar setelah pembeli konfirmasi, atau maksimal 2 hari setelah paket sampai.</p>
                </div>
            </div>

            {{-- Tombol Start Selling --}}
            <div class="flex justify-center mt-10">
                @guest
                    <a href="{{ route('auth.login') }}" class="bg-black text-white font-semibold px-6 py-3 rounded hover:bg-gray-800 transition">
                        Start Selling
                    </a>
                @else
                    <a href="{{ route('barangs.jual') }}" class="bg-black text-white font-semibold px-6 py-3 rounded hover:bg-gray-800 transition">
                        Start Selling
                    </a>
                @endguest
            </div>
        </div>
    </section>
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-2xl md:text-3xl font-bold mb-12">
                Belanja dengan aman di SecondChance
            </h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Langkah 1 -->
                <div>
                    <img src="{{ asset('images/beli-1.jpg') }}" alt="Temukan Produk" class="w-100 h-55 rounded-lg mb-4 mx-auto" />
                    <h3 class="text-lg font-semibold mb-2">1. Temukan produknya</h3>
                    <p>Temukan puluhan ribu produk unik dari ribuan merek dan pilih favoritmu.</p>
                </div>

                <!-- Langkah 2 -->
                <div>
                    <img src="{{ asset('images/beli-2.jpg') }}" alt="Beli Sekarang" class="w-100 h-55 rounded-lg mb-4 mx-auto" />
                    <h3 class="text-lg font-semibold mb-2">2. Beli</h3>
                    <p>Tanyakan apa pun kepada penjual, kemudian klik <strong>Buy Now</strong>. Lakukan pembayaran dengan aman melalui QRIS atau bank pilihan favoritmu.</p>
                </div>

                <!-- Langkah 3 -->
                <div>
                    <img src="{{ asset('images/beli-3.jpg') }}" alt="Produk Diterima" class="object-cover w-100 h-55 rounded-lg mb-4 mx-auto" />
                    <h3 class="text-lg font-semibold mb-2">3. Produk diterima!</h3>
                    <p>Kamu bisa langsung cek status pengiriman melalui aplikasi. Kami akan memberi tahu kamu ketika paket sudah dikirim oleh penjual. Jangan lupa kasih review ya!</p>
                </div>
            </div>

            {{-- Tombol Shop Now --}}
            <div class="flex justify-center mt-10">
                @guest
                    <a href="{{ route('auth.login') }}" class="bg-black text-white font-semibold px-6 py-3 rounded hover:bg-gray-800 transition">
                        Shop now
                    </a>
                @else
                    <a href="{{ route('barangs.index') }}" class="bg-black text-white font-semibold px-6 py-3 rounded hover:bg-gray-800 transition">
                        Shop now
                    </a>
                @endguest
            </div>
        </div>
    </section>
    <section class="relative  text-black">
        <img src="/images/bawah.jpg" alt="Preloved Banner"
            class="absolute inset-0 w-full h-full object-cover opacity-70">
        
        <div class="relative z-10 flex flex-col items-center justify-center text-center px-4 py-20">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-6">
                Download SecondChance untuk<br> iPhone dan Android
            </h1>
            
            <div class="flex items-center gap-4">
                <a href="#" aria-label="Download on App Store">
                    <img src="/images/appstore.png" alt="App Store" class="h-12">
                </a>
                <a href="#" aria-label="Download on Google Play">
                    <img src="/images/googleplay.png" alt="Google Play" class="h-12">
                </a>
            </div>
        </div>
    </section>
</x-default-layout>
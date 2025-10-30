<section id="contact" class="py-20 bg-gray-50 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
            <div class="w-24 h-1 bg-primary-600 mx-auto mb-6"></div>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Kami siap membantu Anda. Jangan ragu untuk menghubungi kami untuk informasi lebih lanjut.
            </p>
        </div>

        <!-- Grid Contact -->
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            <!-- Contact Form -->
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Kirim Pesan</h3>

                @if(session('success'))
                    <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="space-y-6" id="contact-form" method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200"
                                placeholder="nama@email.com">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200"
                                placeholder="08xxxxxxxxxx">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                            <select id="subject" name="subject" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200">
                                <option value="">Pilih Subjek</option>
                                <option value="pendaftaran">Informasi Pendaftaran</option>
                                <option value="program">Program Sekolah</option>
                                <option value="fasilitas">Fasilitas</option>
                                <option value="biaya">Biaya Sekolah</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 resize-none"
                            placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-primary-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-primary-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Kirim Pesan
                        </span>
                    </button>
                </form>
            </div>

            <!-- Contact Info + Map Sejajar -->
            <div class="grid grid-rows-2 gap-6 h-full">
                <!-- Info -->
                <div class="bg-primary-600 text-white rounded-2xl p-8 shadow-lg flex flex-col justify-center">
                    <h3 class="text-2xl font-bold mb-6 text-center">Informasi Kontak</h3>
                    <ul class="space-y-6 text-center">
                        <li>
                            <p class="font-semibold">📍 Alamat</p>
                            <p class="text-gray-100">Jl. Raya Krian No.123, Sidoarjo</p>
                        </li>
                        <li>
                            <p class="font-semibold">📞 Telepon</p>
                            <p class="text-gray-100">(+62) 812-3456-7890</p>
                        </li>
                        <li>
                            <p class="font-semibold">✉️ Email</p>
                            <p class="text-gray-100">info@smp-pancasila.sch.id</p>
                        </li>
                    </ul>
                </div>

                <!-- Map -->
                <div class="overflow-hidden rounded-2xl shadow-lg h-full min-h-[250px]">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.6189146388238!2d112.59543797517615!3d-7.396526772824218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7809cac422c299%3A0x374e3a18c24e96a7!2sSMP%20Pancasila%20Ponokawan!5e0!3m2!1sid!2sid!4v1761813663595!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tailwind CDN -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">

<section id="contact" class="relative z-30 py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Hubungi Kami
            </h2>
            <div class="w-24 h-1 bg-green-600 mx-auto mb-6"></div>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Kami siap membantu Anda. Jangan ragu untuk menghubungi kami.
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 items-start">

            <!-- FORM -->
            <div class="bg-white rounded-2xl p-8 shadow-lg relative z-10">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                    Kirim Pesan
                </h3>

                @if(session('success'))
                    <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap
                            </label>
                            <input type="text" name="name" required
                                oninput="detectInjection(this)"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                       focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>
                            <input type="email" name="email" required
                                oninput="detectInjection(this)"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                       focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nomor Telepon
                            </label>
                            <input type="text" name="phone" required
                                inputmode="numeric"
                                oninput="onlyNumber(this); detectInjection(this)"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                       focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Subjek
                            </label>
                            <select name="subject" required onchange="detectInjection(this)"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                       focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="">Pilih Subjek</option>
                                <option value="pendaftaran">Pendaftaran</option>
                                <option value="program">Program Sekolah</option>
                                <option value="fasilitas">Fasilitas</option>
                                <option value="biaya">Biaya</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Pesan
                        </label>
                        <textarea name="message" rows="5" required
                            oninput="detectInjection(this)"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg
                                   focus:ring-2 focus:ring-green-500 focus:border-green-500 resize-none"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-green-600 text-white py-3 rounded-lg
                               font-semibold hover:bg-green-700 transition shadow-lg">
                        Kirim Pesan
                    </button>
                </form>
            </div>

            <!-- INFO + MAP -->
            <div class="grid grid-rows-2 gap-6">
                <div class="bg-green-600 text-white rounded-2xl p-8 shadow-lg text-center">
                    <h3 class="text-2xl font-bold mb-6">Informasi Kontak</h3>
                    <p>📍 Jl. Raya Krian No.123</p>
                    <p>📞 (+62) 812-3456-7890</p>
                    <p>✉️ info@smp-pancasila.sch.id</p>
                </div>

                <div class="rounded-2xl overflow-hidden shadow-lg min-h-[250px]">
                    <iframe class="w-full h-full"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.6189146388238!2d112.59543797517615!3d-7.396526772824218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7809cac422c299%3A0x374e3a18c24e96a7!2sSMP%20Pancasila%20Ponokawan!5e0!3m2!1sid!2sid!4v1761813663595!5m2!1sid!2sid"
                        loading="lazy"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECURITY SCRIPT -->
<script>
    const forbiddenPattern = /(<script|<\/script|onerror=|onload=|<|>|'|"|--|\/\*|\*\/|union|select|insert|delete|update|drop|or\s+1=1)/gi;

    function detectInjection(el) {
        if (forbiddenPattern.test(el.value)) {
            alert("Lu aneh-aneh Awas aja IP lu kerekam Disini");
            el.value = el.value.replace(forbiddenPattern, '');
        }
    }

    function onlyNumber(el) {
        const clean = el.value.replace(/[^0-9]/g, '');
        if (el.value !== clean) {
            alert("Lu aneh-aneh Awas aja IP lu kerekam Disini");
        }
        el.value = clean;
    }
</script>

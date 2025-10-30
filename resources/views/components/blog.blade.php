<section id="blog" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Berita & Kegiatan</h2>
            <div class="w-24 h-1 bg-primary-600 mx-auto mb-6"></div>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Ikuti perkembangan terbaru dan berbagai kegiatan menarik di SMP Pancasila Krian
            </p>
        </div>

        <!-- Featured Article -->
        @if($featured)
        <div class="mb-16">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="md:flex">
                    <div class="md:w-1/2">
                        @if($featured->image)
                            <img src="{{ asset('storage/'.$featured->image) }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="h-64 md:h-full bg-primary-100 flex items-center justify-center">
                                <span class="text-gray-500">Tidak ada gambar</span>
                            </div>
                        @endif
                    </div>
                    <div class="md:w-1/2 p-8">
                        <div class="flex items-center mb-4">
                            <span class="bg-primary-100 text-primary-600 px-3 py-1 rounded-full text-sm font-medium">
                                Berita Utama
                            </span>
                            <span class="text-gray-500 text-sm ml-3">
                                {{ $featured->created_at->format('d M Y') }}
                            </span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">
                            {{ $featured->title }}
                        </h3>
                        <p class="text-gray-600 mb-6">
                            {{ Str::limit($featured->content, 150) }}
                        </p>
                        <a href="{{ route('berita.public.show', $featured->slug) }}"
                           class="text-primary-600 hover:text-primary-700 font-medium">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Blog Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($news as $item)
                <article class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="h-48">
                        @if($item->image)
                            <img src="{{ asset('storage/'.$item->image) }}" class="w-full h-48 object-cover">
                        @else
                            <div class="h-48 bg-gray-100 flex items-center justify-center">
                                <span class="text-gray-500">Tidak ada gambar</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-3">
                            <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded text-xs font-medium">
                                Berita
                            </span>
                            <span class="text-gray-500 text-sm ml-3">
                                {{ $item->created_at->format('d M Y') }}
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-3">
                            {{ $item->title }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            {{ Str::limit($item->content, 100) }}
                        </p>
                        <a href="{{ route('berita.public.show', $item->slug) }}" 
                           class="text-primary-600 hover:text-primary-700 text-sm font-medium transition-colors duration-200">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-12">
            <button class="bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                Lihat Berita Lainnya
            </button>
        </div>
    </div>
</section>

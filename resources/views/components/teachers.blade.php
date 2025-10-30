<section id="teachers" class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-12">Struktur Guru & Staff</h2>

        {{-- Kepala Sekolah --}}
        @if(isset($teachersByPosition['Kepala Sekolah']))
            <div class="relative flex justify-center mb-16">
                @foreach ($teachersByPosition['Kepala Sekolah'] as $teacher)
                    <div class="bg-white rounded-2xl shadow-md p-6 inline-block relative z-10">
                        @if($teacher->photo)
                            <img src="{{ asset('storage/'.$teacher->photo) }}"
                                 class="w-32 h-32 mx-auto rounded-full object-cover mb-4"
                                 alt="{{ $teacher->name }}">
                        @else
                            <div class="w-32 h-32 mx-auto rounded-full bg-gray-200 flex items-center justify-center mb-4">
                                <span class="text-gray-500 text-sm">No Photo</span>
                            </div>
                        @endif
                        <h3 class="text-lg font-semibold">{{ $teacher->name }}</h3>
                        <p class="text-gray-600">{{ $teacher->position }}</p>
                        @if($teacher->subject)
                            <p class="text-gray-500 text-sm">{{ $teacher->subject }}</p>
                        @endif
                    </div>
                @endforeach

                {{-- Garis otomatis ke bawah --}}
                @if(isset($teachersByPosition['Wakil Kepala Sekolah']) || collect($teachersByPosition)->flatten(1)->count() > 1)
                    <div class="absolute top-full left-1/2 w-1 bg-gray-400 -translate-x-1/2"
                         style="height: 100px;"></div>
                @endif
            </div>
        @endif

        {{-- Wakil Kepala Sekolah --}}
        @if(isset($teachersByPosition['Wakil Kepala Sekolah']))
            <div class="relative flex justify-center mb-16">
                <div class="flex flex-wrap justify-center gap-8">
                    @foreach ($teachersByPosition['Wakil Kepala Sekolah'] as $teacher)
                        <div class="bg-white rounded-2xl shadow-md p-6 relative z-10">
                            @if($teacher->photo)
                                <img src="{{ asset('storage/'.$teacher->photo) }}"
                                     class="w-28 h-28 mx-auto rounded-full object-cover mb-4"
                                     alt="{{ $teacher->name }}">
                            @else
                                <div class="w-28 h-28 mx-auto rounded-full bg-gray-200 flex items-center justify-center mb-4">
                                    <span class="text-gray-500 text-sm">No Photo</span>
                                </div>
                            @endif
                            <h3 class="text-lg font-semibold">{{ $teacher->name }}</h3>
                            <p class="text-gray-600">{{ $teacher->position }}</p>
                            @if($teacher->subject)
                                <p class="text-gray-500 text-sm">{{ $teacher->subject }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>

                {{-- Garis konektor ke guru --}}
                @if(collect($teachersByPosition)->except(['Kepala Sekolah','Wakil Kepala Sekolah'])->flatten(1)->count() > 0)
                    <div class="absolute top-full left-1/2 w-1 bg-gray-300 -translate-x-1/2"
                         style="height: 80px;"></div>
                @endif
            </div>
        @endif

        {{-- Guru & Staff Lainnya --}}
        @if(collect($teachersByPosition)->except(['Kepala Sekolah','Wakil Kepala Sekolah'])->flatten(1)->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($teachersByPosition as $jabatan => $teachers)
                    @if(!in_array($jabatan, ['Kepala Sekolah', 'Wakil Kepala Sekolah']))
                        @foreach ($teachers as $teacher)
                            <div class="bg-white rounded-2xl shadow-md p-6">
                                @if($teacher->photo)
                                    <img src="{{ asset('storage/'.$teacher->photo) }}"
                                         class="w-24 h-24 mx-auto rounded-full object-cover mb-4"
                                         alt="{{ $teacher->name }}">
                                @else
                                    <div class="w-24 h-24 mx-auto rounded-full bg-gray-200 flex items-center justify-center mb-4">
                                        <span class="text-gray-500 text-sm">No Photo</span>
                                    </div>
                                @endif
                                <h3 class="text-lg font-semibold">{{ $teacher->name }}</h3>
                                <p class="text-gray-600">{{ $teacher->position }}</p>
                                @if($teacher->subject)
                                    <p class="text-gray-500 text-sm">{{ $teacher->subject }}</p>
                                @endif
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</section>

<x-app-layout>

<div class="bg-gradient-to-br from-slate-50 to-slate-100 antialiased">

    <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <!-- Main Card dengan desain modern -->
            <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/80 border border-slate-200/90 overflow-hidden">
                <!-- Header dengan accent gradient -->
                <div class="relative px-6 py-5 border-b border-slate-200 bg-white/95 flex items-center gap-3">
                    <div class="h-8 w-1.5 bg-gradient-to-b from-purple-500 to-pink-600 rounded-full"></div>
                    <div>
                        <h2 class="text-xl font-bold tracking-tight text-slate-800 flex items-center gap-2">
                            📖 Tambah Matakuliah Baru
                        </h2>
                        <p class="text-xs text-slate-500 mt-0.5">Lengkapi data mata kuliah untuk kurikulum akademik</p>
                    </div>
                    <!-- Decorative element -->
                    <div class="ml-auto hidden sm:block">
                        <div class="flex items-center gap-2 text-xs text-slate-400">
                            <span class="inline-block w-2 h-2 rounded-full bg-purple-400 animate-pulse"></span>
                            Form Pendaftaran Matakuliah
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-6 md:p-8">
                    <form method="POST" action="{{ route('matakuliah.store') }}" class="space-y-8">
                        @csrf

                        <!-- Grid layout untuk form -->
                        <div class="space-y-6">
                            <!-- Nama Matakuliah Field -->
                            <div>
                                <label for="nama_matakuliah" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                    Nama Matakuliah <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           name="nama_matakuliah" 
                                           id="nama_matakuliah" 
                                           value="{{ old('nama_matakuliah') }}"
                                           class="block w-full rounded-xl border border-slate-300 bg-slate-50/40 pl-10 pr-4 py-2.5 text-sm text-slate-800 placeholder:text-slate-400 focus:border-purple-400 focus:bg-white focus:ring-2 focus:ring-purple-200 transition-all duration-200"
                                           placeholder="Contoh: Pemrograman Web, Basis Data, Kalkulus">
                                </div>
                                @error('nama_matakuliah')
                                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                @else
                                    <p class="mt-1 text-xs text-slate-400">Nama mata kuliah harus unik dan sesuai dengan kurikulum</p>
                                @enderror
                            </div>

                            <!-- SKS Field dengan Select yang lebih baik -->
                            <div>
                                <label for="sks" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                    Jumlah SKS <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-6 3v-3m-6 3h18M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />
                                        </svg>
                                    </div>
                                    <select name="sks" 
                                            id="sks" 
                                            class="block w-full rounded-xl border border-slate-300 bg-slate-50/40 pl-10 pr-10 py-2.5 text-sm text-slate-800 focus:border-purple-400 focus:bg-white focus:ring-2 focus:ring-purple-200 transition-all duration-200">
                                        <option value="" disabled {{ old('sks') ? '' : 'selected' }}>Pilih Jumlah SKS</option>
                                        <option value="1" {{ old('sks') == '1' ? 'selected' : '' }}>1 SKS (Kuliah 50 menit/minggu)</option>
                                        <option value="2" {{ old('sks') == '2' ? 'selected' : '' }}>2 SKS (Kuliah 100 menit/minggu)</option>
                                        <option value="3" {{ old('sks') == '3' ? 'selected' : '' }}>3 SKS (Kuliah 150 menit/minggu)</option>
                                        <option value="4" {{ old('sks') == '4' ? 'selected' : '' }}>4 SKS (Kuliah 200 menit/minggu)</option>
                                        <option value="5" {{ old('sks') == '5' ? 'selected' : '' }}>5 SKS (Kuliah 250 menit/minggu)</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                @error('sks')
                                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                @else
                                    <p class="mt-1 text-xs text-slate-400">Jumlah SKS yang akan dibebankan per minggu</p>
                                @enderror
                            </div>

                            <!-- Jurusan Select -->
                            <div>
                                <label for="id_jurusan" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                    Program Studi / Jurusan <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <select name="id_jurusan" 
                                            id="id_jurusan" 
                                            class="block w-full rounded-xl border border-slate-300 bg-slate-50/40 pl-10 pr-10 py-2.5 text-sm text-slate-800 focus:border-purple-400 focus:bg-white focus:ring-2 focus:ring-purple-200 transition-all duration-200">
                                        <option value="" disabled {{ old('id_jurusan') ? '' : 'selected' }}>Pilih Program Studi</option>
                                        @foreach ($jurusan as $jur)
                                            <option value="{{ $jur->id_jurusan }}" {{ old('id_jurusan') == $jur->id_jurusan ? 'selected' : '' }}>
                                                {{ $jur->nama_jurusan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                @error('id_jurusan')
                                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                @else
                                    <p class="mt-1 text-xs text-slate-400">Program studi penyelenggara mata kuliah</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Informational Box -->
                        <div class="bg-purple-50/40 rounded-xl p-4 border border-purple-100">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="text-xs text-slate-600">
                                    <p class="font-medium text-purple-800">Informasi Penting</p>
                                    <p class="mt-0.5">Pastikan data mata kuliah sesuai dengan kurikulum yang berlaku. SKS yang tertera akan mempengaruhi beban belajar mahasiswa.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-end gap-3 pt-2">
                            <a href="{{ route('matakuliah.index') }}" 
                               class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50 hover:text-slate-800 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2 transition-all duration-200">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Batal / Kembali
                            </a>
                            <button type="submit" 
                                    class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transform transition-all duration-200 active:scale-95">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Simpan Matakuliah
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Additional Info Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
                <div class="bg-white rounded-xl p-4 shadow-sm border border-slate-200">
                    <div class="flex items-start gap-3">
                        <div class="p-2 rounded-lg bg-blue-50">
                            <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-slate-800">Tips Pengisian</h4>
                            <p class="text-xs text-slate-500 mt-1">Gunakan nama mata kuliah yang standar dan sesuai dengan dokumen kurikulum untuk memudahkan pengelolaan.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-sm border border-slate-200">
                    <div class="flex items-start gap-3">
                        <div class="p-2 rounded-lg bg-green-50">
                            <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-slate-800">SKS</h4>
                            <p class="text-xs text-slate-500 mt-1">Penentuan SKS harus sesuai dengan beban belajar dan kompleksitas mata kuliah.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center text-xs text-slate-400 mt-6 flex justify-center gap-6">
                <span class="inline-flex items-center gap-1.5">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-purple-400"></span>
                    Data akan tersimpan di database master matakuliah
                </span>
                <span class="inline-flex items-center gap-1.5">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                    * Wajib diisi
                </span>
            </div>
        </div>
    </div>

    <script>
        // Auto-focus pada field pertama saat load
        document.addEventListener('DOMContentLoaded', function() {
            const firstInput = document.getElementById('nama_matakuliah');
            if(firstInput) firstInput.focus();
            
            // Highlight error fields with proper styling
            const errorElements = document.querySelectorAll('.text-rose-500');
            errorElements.forEach(err => {
                const parentField = err.closest('div');
                if(parentField) {
                    const inputField = parentField.querySelector('input, select');
                    if(inputField) {
                        inputField.classList.add('border-rose-300', 'bg-rose-50/20', 'focus:border-rose-400', 'focus:ring-rose-200');
                    }
                }
            });
        });
    </script>
</div>


</x-app-layout>
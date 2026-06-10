<x-app-layout>
<div class="bg-gradient-to-br from-slate-50 to-slate-100 antialiased">

    <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Main Card dengan desain modern -->
            <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/80 border border-slate-200/90 overflow-hidden">
                <!-- Header dengan accent gradient -->
                <div class="relative px-6 py-5 border-b border-slate-200 bg-white/95 flex items-center gap-3">
                    <div class="h-8 w-1.5 bg-gradient-to-b from-emerald-500 to-teal-600 rounded-full"></div>
                    <div>
                        <h2 class="text-xl font-bold tracking-tight text-slate-800 flex items-center gap-2">
                            🎓 Tambah Mahasiswa Baru
                        </h2>
                        <p class="text-xs text-slate-500 mt-0.5">Isi data akademik mahasiswa dengan lengkap</p>
                    </div>
                    <!-- Decorative element -->
                    <div class="ml-auto hidden sm:block">
                        <div class="flex items-center gap-2 text-xs text-slate-400">
                            <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            Form Pendaftaran
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-6 md:p-8">
                    <form method="POST" action="{{ route('mahasiswa.store') }}" class="space-y-8">
                        @csrf

                        <!-- Grid 2 columns untuk layout yang lebih rapi -->
                        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                            <!-- NIM Field -->
                            <div class="sm:col-span-1">
                                <label for="nim" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                    NIM <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-4 0h4" />
                                        </svg>
                                    </div>
                                    <input type="text" name="nim" id="nim" 
                                           class="block w-full rounded-xl border border-slate-300 bg-slate-50/40 pl-10 pr-4 py-2.5 text-sm text-slate-800 placeholder:text-slate-400 focus:border-emerald-400 focus:bg-white focus:ring-2 focus:ring-emerald-200 transition-all duration-200"
                                           placeholder="Contoh: 2201010101" 
                                           value="{{ old('nim') }}">
                                </div>
                                @error('nim')
                                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                @else
                                    <p class="mt-1 text-xs text-slate-400">Nomor Induk Mahasiswa (unik)</p>
                                @enderror
                            </div>

                            <!-- Nama Field -->
                            <div class="sm:col-span-1">
                                <label for="nama" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                    Nama Lengkap <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="nama" id="nama" 
                                           class="block w-full rounded-xl border border-slate-300 bg-slate-50/40 pl-10 pr-4 py-2.5 text-sm text-slate-800 placeholder:text-slate-400 focus:border-emerald-400 focus:bg-white focus:ring-2 focus:ring-emerald-200 transition-all duration-200"
                                           placeholder="Nama lengkap mahasiswa" 
                                           value="{{ old('nama') }}">
                                </div>
                                @error('nama')
                                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                @else
                                    <p class="mt-1 text-xs text-slate-400">Nama sesuai kartu identitas</p>
                                @enderror
                            </div>

                            <!-- Jurusan Select -->
                            <div class="sm:col-span-2 md:col-span-1">
                                <label for="id_jurusan" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                    Program Studi / Jurusan <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <select name="id_jurusan" id="id_jurusan" 
                                            class="block w-full appearance-none rounded-xl border border-slate-300 bg-slate-50/40 pl-10 pr-8 py-2.5 text-sm text-slate-800 focus:border-emerald-400 focus:bg-white focus:ring-2 focus:ring-emerald-200 transition-all duration-200">
                                        <option value="" disabled {{ old('id_jurusan') ? '' : 'selected' }}>Pilih Jurusan</option>
                                        @foreach ($jurusan as $j)
                                            <option value="{{ $j->id_jurusan }}" {{ old('id_jurusan') == $j->id_jurusan ? 'selected' : '' }}>
                                                {{ $j->nama_jurusan }}
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
                                    <p class="mt-1 text-xs text-slate-400">Pilih program studi yang sesuai</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Informational Box (opsional) -->
                        <div class="bg-emerald-50/40 rounded-xl p-4 border border-emerald-100">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="text-xs text-slate-600">
                                    <p class="font-medium text-emerald-800">Informasi Pendaftaran</p>
                                    <p class="mt-0.5">Pastikan data NIM belum terdaftar sebelumnya. Data yang sudah disimpan dapat diubah melalui menu Edit Mahasiswa.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons group -->
                        <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-end gap-3 pt-2">
                            <a href="{{ route('mahasiswa.index') }}" 
                               class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50 hover:text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 transition-all duration-200">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Batal / Kembali
                            </a>
                            <button type="submit" 
                                    class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-xl bg-emerald-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transform transition-all duration-200 active:scale-95">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Simpan Mahasiswa
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Footer info -->
            <div class="text-center text-xs text-slate-400 mt-6 flex justify-center gap-6">
                <span class="inline-flex items-center gap-1.5">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    Data akan tersimpan di database
                </span>
                <span class="inline-flex items-center gap-1.5">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                    * Wajib diisi
                </span>
            </div>
        </div>
    </div>

    <script>
        // Optional: auto-focus pada field pertama saat load
        document.addEventListener('DOMContentLoaded', function() {
            const firstInput = document.querySelector('input[name="nim"]');
            if(firstInput) firstInput.focus();
            
            // Styling error fields
            const errorElements = document.querySelectorAll('.text-rose-500');
            errorElements.forEach(err => {
                const parentField = err.closest('.sm\\:col-span-1, .sm\\:col-span-2');
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
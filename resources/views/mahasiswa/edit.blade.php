<x-app-layout>
    
<div class="bg-gradient-to-br from-slate-50 to-slate-100 antialiased">

    <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Main Card with modern design -->
            <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/80 border border-slate-200/90 overflow-hidden">
                <!-- Header with accent & subtle gradient -->
                <div class="relative px-6 py-5 border-b border-slate-200 bg-white/95 flex items-center gap-3">
                    <div class="h-8 w-1.5 bg-gradient-to-b from-indigo-500 to-indigo-600 rounded-full"></div>
                    <div>
                        <h2 class="text-xl font-bold tracking-tight text-slate-800 flex items-center gap-2">
                            ✏️ Edit Mahasiswa
                        </h2>
                        <p class="text-xs text-slate-500 mt-0.5">Perbaharui data akademik mahasiswa</p>
                    </div>
                    <!-- badge nim kecil (optional) -->
                    <div class="ml-auto hidden sm:block">
                        <span class="inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-200">
                            NIM: {{ $mahasiswa->nim ?? '—' }}
                        </span>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-6 md:p-8">
                    <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- Grid 2 columns for responsive, tapi tetap rapi -->
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
                                    <input type="text" name="nim" id="nim" value="{{ old('nim', $mahasiswa->nim) }}" 
                                           class="block w-full rounded-xl border border-slate-300 bg-slate-50/40 pl-10 pr-4 py-2.5 text-sm text-slate-800 placeholder:text-slate-400 focus:border-indigo-400 focus:bg-white focus:ring-2 focus:ring-indigo-200 transition-all duration-200"
                                           placeholder="Contoh: 2201010101">
                                </div>
                                @error('nim')
                                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
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
                                    <input type="text" name="nama" id="nama" value="{{ old('nama', $mahasiswa->nama) }}" 
                                           class="block w-full rounded-xl border border-slate-300 bg-slate-50/40 pl-10 pr-4 py-2.5 text-sm text-slate-800 placeholder:text-slate-400 focus:border-indigo-400 focus:bg-white focus:ring-2 focus:ring-indigo-200 transition-all duration-200"
                                           placeholder="Nama mahasiswa">
                                </div>
                                @error('nama')
                                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Jurusan Select -->
                            <div class="sm:col-span-1">
                                <label for="id_jurusan" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                    Jurusan
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <select name="id_jurusan" id="id_jurusan" 
                                            class="block w-full appearance-none rounded-xl border border-slate-300 bg-slate-50/40 pl-10 pr-8 py-2.5 text-sm text-slate-800 focus:border-indigo-400 focus:bg-white focus:ring-2 focus:ring-indigo-200 transition-all duration-200">
                                        @foreach ($jurusan as $j)
                                            <option value="{{ $j->id_jurusan }}" {{ (old('id_jurusan', $mahasiswa->id_jurusan) == $j->id_jurusan) ? 'selected' : '' }}>
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
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons group with responsive stack -->
                        <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-end gap-3 pt-4 mt-2 border-t border-slate-200">
                            <a href="{{ route('mahasiswa.index') }}" 
                               class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50 hover:text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 transition-all duration-200">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Kembali
                            </a>
                            <button type="submit" 
                                    class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-xl bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transform transition-all duration-200 active:scale-95">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Informational Footer (optional) -->
            <div class="text-center text-xs text-slate-400 mt-6 flex justify-center gap-4">
                <span class="inline-flex items-center gap-1">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-indigo-400"></span> 
                    Pastikan data sesuai
                </span>
                <span class="inline-flex items-center gap-1">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-400"></span> 
                    NIM tidak dapat digandakan
                </span>
            </div>
        </div>
    </div>

    <!-- Small JS for optional extra: menjaga nilai selected matakuliah jika ada old input -->
    <script>
        // optional auto-sync jika ada session error: menjaga highlight
        document.addEventListener('DOMContentLoaded', function() {
            // focus pada field error pertama jika ada error Laravel (optional)
            const errorElements = document.querySelectorAll('.text-rose-500');
            if(errorElements.length > 0) {
                const firstErrorField = errorElements[0].previousElementSibling?.querySelector('input, select');
                if(firstErrorField) firstErrorField.classList.add('border-rose-300', 'ring-rose-100');
            }
        });
    </script>
</div>

</x-app-layout>
<x-app-layout>

<div class="bg-gradient-to-br from-slate-50 to-slate-100 antialiased">

    <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <!-- Main Card dengan desain modern -->
            <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/80 border border-slate-200/90 overflow-hidden">
                <!-- Header dengan accent gradient -->
                <div class="relative px-6 py-5 border-b border-slate-200 bg-white/95 flex items-center gap-3">
                    <div class="h-8 w-1.5 bg-gradient-to-b from-amber-500 to-orange-600 rounded-full"></div>
                    <div>
                        <h2 class="text-xl font-bold tracking-tight text-slate-800 flex items-center gap-2">
                            ✏️ Edit Jurusan
                        </h2>
                        <p class="text-xs text-slate-500 mt-0.5">Perbaharui data program studi yang terdaftar</p>
                    </div>
                    <!-- Badge info -->
                    <div class="ml-auto hidden sm:block">
                        <span class="inline-flex items-center rounded-full bg-amber-50 px-3 py-1 text-xs font-medium text-amber-700 ring-1 ring-inset ring-amber-200">
                            ID: {{ $jurusan->id_jurusan }}
                        </span>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-6 md:p-8">
                    <form method="POST" action="{{ route('jurusan.update', $jurusan->id_jurusan) }}" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- Form Fields -->
                        <div class="space-y-6">
                            <!-- Nama Jurusan Field -->
                            <div>
                                <label for="nama_jurusan" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                    Nama Jurusan / Program Studi <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           name="nama_jurusan" 
                                           id="nama_jurusan" 
                                           value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                                           class="block w-full rounded-xl border border-slate-300 bg-slate-50/40 pl-10 pr-4 py-2.5 text-sm text-slate-800 placeholder:text-slate-400 focus:border-amber-400 focus:bg-white focus:ring-2 focus:ring-amber-200 transition-all duration-200"
                                           placeholder="Contoh: Teknik Informatika, Sistem Informasi, Manajemen">
                                </div>
                                @error('nama_jurusan')
                                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                @else
                                    <p class="mt-1 text-xs text-slate-400">Nama jurusan harus unik dan akan digunakan untuk pengelompokan data akademik</p>
                                @enderror
                            </div>

                            <!-- Informational Box - Data yang akan diupdate -->
                            <div class="bg-amber-50/40 rounded-xl p-4 border border-amber-100">
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div class="text-xs text-slate-600">
                                        <p class="font-medium text-amber-800">Informasi Update</p>
                                        <p class="mt-0.5">Perubahan nama jurusan akan langsung tercermin pada data mahasiswa yang terkait. Pastikan nama yang dimasukkan sudah sesuai dengan SK terbaru.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-end gap-3 pt-2">
                            <a href="{{ route('jurusan.index') }}" 
                               class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50 hover:text-slate-800 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 transition-all duration-200">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Batal / Kembali
                            </a>
                            <button type="submit" 
                                    class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-xl bg-amber-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transform transition-all duration-200 active:scale-95">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Update Jurusan
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-slate-800">Data Terkait</h4>
                            <p class="text-xs text-slate-500 mt-1">Perubahan jurusan akan mempengaruhi data mahasiswa yang terdaftar di jurusan ini.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-sm border border-slate-200">
                    <div class="flex items-start gap-3">
                        <div class="p-2 rounded-lg bg-green-50">
                            <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-slate-800">Validasi</h4>
                            <p class="text-xs text-slate-500 mt-1">Pastikan nama jurusan tidak sama dengan data yang sudah ada untuk menghindari duplikasi.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer dengan informasi tambahan -->
            <div class="text-center text-xs text-slate-400 mt-6 flex justify-center gap-6">
                <span class="inline-flex items-center gap-1.5">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                    Mengupdate data di database
                </span>
                <span class="inline-flex items-center gap-1.5">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                    Perubahan bersifat permanen
                </span>
            </div>
        </div>
    </div>

    <script>
        // Auto-focus pada field nama jurusan saat load
        document.addEventListener('DOMContentLoaded', function() {
            const namaJurusanInput = document.getElementById('nama_jurusan');
            if(namaJurusanInput) {
                namaJurusanInput.focus();
                // Place cursor at the end of text
                const length = namaJurusanInput.value.length;
                namaJurusanInput.setSelectionRange(length, length);
            }
            
            // Highlight error fields with proper styling
            const errorElements = document.querySelectorAll('.text-rose-500');
            errorElements.forEach(err => {
                const parentField = err.closest('div');
                if(parentField) {
                    const inputField = parentField.querySelector('input, select, textarea');
                    if(inputField) {
                        inputField.classList.add('border-rose-300', 'bg-rose-50/20', 'focus:border-rose-400', 'focus:ring-rose-200');
                    }
                }
            });
        });
    </script>
</div>

</x-app-layout>
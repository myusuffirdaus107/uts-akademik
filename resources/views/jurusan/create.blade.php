<x-app-layout>
<div class="bg-gradient-to-br from-slate-50 to-slate-100 antialiased">

    <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <!-- Main Card dengan desain modern -->
            <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/80 border border-slate-200/90 overflow-hidden">
                <!-- Header dengan accent gradient -->
                <div class="relative px-6 py-5 border-b border-slate-200 bg-white/95 flex items-center gap-3">
                    <div class="h-8 w-1.5 bg-gradient-to-b from-emerald-500 to-teal-600 rounded-full"></div>
                    <div>
                        <h2 class="text-xl font-bold tracking-tight text-slate-800 flex items-center gap-2">
                            🏛️ Tambah Jurusan Baru
                        </h2>
                        <p class="text-xs text-slate-500 mt-0.5">Lengkapi data program studi untuk pendataan akademik</p>
                    </div>
                    <!-- Decorative element -->
                    <div class="ml-auto hidden sm:block">
                        <div class="flex items-center gap-2 text-xs text-slate-400">
                            <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            Form Pendaftaran Jurusan
                        </div>
                    </div>
                </div>

                <!-- Card div -->
                <div class="p-6 md:p-8">
                    <form method="POST" action="{{ route('jurusan.store') }}" class="space-y-8">
                        @csrf

                        <!-- Grid layout untuk form -->
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
                                           value="{{ old('nama_jurusan') }}"
                                           class="block w-full rounded-xl border border-slate-300 bg-slate-50/40 pl-10 pr-4 py-2.5 text-sm text-slate-800 placeholder:text-slate-400 focus:border-emerald-400 focus:bg-white focus:ring-2 focus:ring-emerald-200 transition-all duration-200"
                                           placeholder="Contoh: Teknik Informatika, Sistem Informasi, Manajemen">
                                </div>
                                @error('nama_jurusan')
                                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                @else
                                    <p class="mt-1 text-xs text-slate-400">Nama jurusan harus unik dan tidak boleh sama dengan yang sudah ada</p>
                                @enderror
                            </div>

                            <!-- Akreditasi Field dengan desain lebih baik -->
                            <div>
                                <label for="akreditasi" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                    Akreditasi <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <select name="akreditasi" 
                                            id="akreditasi" 
                                            class="block w-full rounded-xl border border-slate-300 bg-slate-50/40 pl-10 pr-10 py-2.5 text-sm text-slate-800 focus:border-emerald-400 focus:bg-white focus:ring-2 focus:ring-emerald-200 transition-all duration-200">
                                        <option value="" disabled {{ old('akreditasi') ? '' : 'selected' }}>Pilih Akreditasi</option>
                                        <option value="A" {{ old('akreditasi') == 'A' ? 'selected' : '' }}>A (Unggul)</option>
                                        <option value="AB" {{ old('akreditasi') == 'AB' ? 'selected' : '' }}>AB (Sangat Baik)</option>
                                        <option value="B" {{ old('akreditasi') == 'B' ? 'selected' : '' }}>B (Baik)</option>
                                        <option value="C" {{ old('akreditasi') == 'C' ? 'selected' : '' }}>C (Cukup)</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                @error('akreditasi')
                                    <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                                @else
                                    <p class="mt-1 text-xs text-slate-400">Tingkat akreditasi program studi</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Informational Box -->
                        <div class="bg-emerald-50/40 rounded-xl p-4 border border-emerald-100">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="text-xs text-slate-600">
                                    <p class="font-medium text-emerald-800">Informasi Penting</p>
                                    <p class="mt-0.5">Pastikan nama jurusan ditulis dengan lengkap dan sesuai dengan SK resmi. Data jurusan akan digunakan untuk pengelompokan mahasiswa dan mata kuliah.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-end gap-3 pt-2">
                            <a href="{{ route('jurusan.index') }}" 
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
                                Simpan Jurusan
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
                            <p class="text-xs text-slate-500 mt-1">Gunakan nama jurusan resmi sesuai dengan akreditasi dan SK terbaru untuk menghindari duplikasi data.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-sm border border-slate-200">
                    <div class="flex items-start gap-3">
                        <div class="p-2 rounded-lg bg-purple-50">
                            <svg class="h-5 w-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-slate-800">Akreditasi</h4>
                            <p class="text-xs text-slate-500 mt-1">Pastikan memilih akreditasi yang sesuai dengan status terbaru program studi.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center text-xs text-slate-400 mt-6">
                <span class="inline-flex items-center gap-1">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    Data akan tersimpan di database master jurusan
                </span>
            </div>
        </div>
    </div>

    <script>
        // Auto-focus pada field pertama saat load
        document.addEventListener('DOMContentLoaded', function() {
            const firstInput = document.getElementById('nama_jurusan');
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
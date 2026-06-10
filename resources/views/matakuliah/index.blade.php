<x-app-layout>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="bg-gradient-to-br from-slate-50 to-slate-100 antialiased">

        <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto">
                <!-- Main Card -->
                <div
                    class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 border border-slate-200/80 overflow-hidden">
                    <!-- Card Header dengan Flex dan Desain Modern -->
                    <div
                        class="px-6 py-5 border-b border-slate-200 bg-white/95 backdrop-blur-sm flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <div class="h-8 w-1.5 bg-gradient-to-b from-purple-500 to-pink-600 rounded-full"></div>
                            <div>
                                <h2 class="text-xl font-bold tracking-tight text-slate-800 flex items-center gap-2">
                                    📚 Data Matakuliah
                                </h2>
                                <p class="text-xs text-slate-500 mt-0.5">Kelola mata kuliah yang tersedia pada program
                                    studi</p>
                            </div>
                            <span
                                class="inline-flex items-center rounded-full bg-purple-50 px-2.5 py-0.5 text-xs font-semibold text-purple-700 ring-1 ring-inset ring-purple-700/10 ml-2">
                                Total {{ $matakuliah->count() ?? 0 }}
                            </span>
                        </div>
                        <a href="{{ route('matakuliah.create') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-purple-600 to-pink-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-[1.02] active:scale-95">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Matakuliah
                        </a>
                    </div>

                    <!-- Card Body -->
                    <div class="p-5 md:p-6">
                        <!-- Session Success Alert -->
                        @if (session('success'))
                            <div id="success-alert"
                                class="mb-6 rounded-xl bg-emerald-50 border-l-4 border-emerald-500 p-4 shadow-sm flex items-start justify-between transition-all duration-300">
                                <div class="flex items-center gap-3">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="text-sm font-medium text-emerald-800">{{ session('success') }}</div>
                                </div>
                                <button type="button" onclick="this.closest('#success-alert').remove()"
                                    class="text-emerald-600 hover:text-emerald-800">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @endif

                        <!-- Session Error Alert -->
                        @if (session('error'))
                            <div id="error-alert"
                                class="mb-6 rounded-xl bg-red-50 border-l-4 border-red-500 p-4 shadow-sm flex items-start justify-between transition-all duration-300">
                                <div class="flex items-center gap-3">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="text-sm font-medium text-red-800">{{ session('error') }}</div>
                                </div>
                                <button type="button" onclick="this.closest('#error-alert').remove()"
                                    class="text-red-600 hover:text-red-800">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @endif

                        <!-- Table Wrapper Responsive -->
                        <div
                            class="table-wrapper overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
                            <table class="min-w-full divide-y divide-slate-200">
                                <thead class="bg-gradient-to-r from-slate-50 to-slate-100">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                            <div class="flex items-center gap-2">
                                                <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                </svg>
                                                Nama Matakuliah
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-600 w-36">
                                            <div class="flex items-center justify-center gap-2">
                                                <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                                Aksi
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 bg-white">
                                    @forelse ($matakuliah as $mk)
                                        <tr class="hover:bg-slate-50/80 transition-colors duration-150 group">
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="h-8 w-8 rounded-lg bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center">
                                                        <svg class="h-4 w-4 text-purple-600" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                        </svg>
                                                    </div>
                                                    <span class="text-sm font-semibold text-slate-800">
                                                        {{ $mk->nama_matakuliah }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 text-center">
                                                <div class="flex items-center justify-center gap-2">
                                                    <a href="{{ route('matakuliah.edit', $mk->id) }}"
                                                        class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700 ring-1 ring-inset ring-amber-300 hover:bg-amber-100 transition-all duration-200 group-hover:shadow-sm">
                                                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('matakuliah.destroy', $mk->id) }}"
                                                        method="POST" class="inline-block"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus mata kuliah \"{{ addslashes($mk->nama_matakuliah) }}\"?\\nData yang terkait dengan mata kuliah ini akan terpengaruh.')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 ring-1 ring-inset ring-red-300 hover:bg-red-100 transition-all duration-200 group-hover:shadow-sm">
                                                            <svg class="h-3.5 w-3.5" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                        </tr>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="px-6 py-12 text-center">
                                                <div class="flex flex-col items-center justify-center gap-3">
                                                    <div class="rounded-full bg-slate-100 p-4">
                                                        <svg class="h-10 w-10 text-slate-400" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-base font-medium text-slate-500">Belum ada data
                                                            matakuliah</p>
                                                        <p class="text-sm text-slate-400 mt-1">Silakan klik tombol
                                                            "Tambah Matakuliah" untuk menambahkan</p>
                                                    </div>
                                                    <a href="{{ route('matakuliah.create') }}"
                                                        class="mt-2 inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-purple-600 to-pink-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:from-purple-700 hover:to-pink-700 transition-all">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 4v16m8-8H4" />
                                                        </svg>
                                                        Tambah Matakuliah Sekarang
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination Links (jika menggunakan paginate) -->
                        @if (method_exists($matakuliah, 'links') && $matakuliah->hasPages())
                            <div class="mt-6 border-t border-slate-200 pt-5 flex justify-center">
                                <div class="flex gap-1">
                                    {{ $matakuliah->links() }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Footer Statistics / Info -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">
                    <div class="bg-white rounded-xl p-4 shadow-sm border border-slate-200">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-purple-50">
                                <svg class="h-5 w-5 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Total Matakuliah</p>
                                <p class="text-xl font-bold text-slate-800">{{ $matakuliah->count() ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-4 shadow-sm border border-slate-200">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-emerald-50">
                                <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Status</p>
                                <p class="text-sm font-semibold text-emerald-600">Aktif</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-4 shadow-sm border border-slate-200">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-pink-50">
                                <svg class="h-5 w-5 text-pink-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500">Aksi Cepat</p>
                                <a href="{{ route('matakuliah.create') }}"
                                    class="text-sm font-semibold text-pink-600 hover:text-pink-700">Tambah Baru →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Auto close alerts after 4 seconds
            document.addEventListener('DOMContentLoaded', function() {
                const alertBox = document.getElementById('success-alert');
                if (alertBox) {
                    setTimeout(() => {
                        alertBox.style.opacity = '0';
                        setTimeout(() => {
                            alertBox?.remove();
                        }, 300);
                    }, 4000);
                }

                const errorAlert = document.getElementById('error-alert');
                if (errorAlert) {
                    setTimeout(() => {
                        errorAlert.style.opacity = '0';
                        setTimeout(() => {
                            errorAlert?.remove();
                        }, 5000);
                    }, 5000);
                }
            });
        </script>
    </div>

    <a href="{{ route('matakuliah.print') }}" target="_blank" class="btn btn-danger">
        Export PDF
    </a>

    <a href="{{ route('matakuliah.export-excel') }}" target="_blank" class="btn btn-success">
        Export Excel
    </a>

</x-app-layout>

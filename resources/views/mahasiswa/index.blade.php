<x-app-layout>

<div class="bg-gradient-to-br from-slate-50 to-slate-100 antialiased">

    <!-- main layout container (mirip x-app-layout) -->
    <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- card shadow elegant -->
            <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 border border-slate-200/80 overflow-hidden">
                <!-- card header dengan flex & subtle gradient -->
                <div class="px-6 py-5 border-b border-slate-200 bg-white/90 backdrop-blur-sm flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="h-9 w-1.5 bg-gradient-to-b from-indigo-500 to-indigo-600 rounded-full"></div>
                        <h1 class="text-xl font-bold tracking-tight text-slate-800">
                            📋 Data Mahasiswa
                        </h1>
                        <span class="inline-flex items-center rounded-full bg-indigo-50 px-2.5 py-0.5 text-xs font-semibold text-indigo-700 ring-1 ring-inset ring-indigo-700/10">
                            Total {{ $mahasiswa->count() ?? 0 }}
                        </span>
                    </div>
                    <a href="{{ route('mahasiswa.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-[1.02] active:scale-95">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Mahasiswa
                    </a>
                </div>

                <!-- card body dengan padding dan tabel responsif -->
                <div class="p-5 md:p-6">
                    <!-- alert sukses dengan animasi -->
                    @if(session('success'))
                        <div id="success-alert" class="mb-6 rounded-xl bg-emerald-50 border-l-4 border-emerald-500 p-4 shadow-sm flex items-start justify-between transition-all duration-300">
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="text-sm font-medium text-emerald-800">{{ session('success') }}</div>
                            </div>
                            <button type="button" onclick="this.closest('#success-alert').remove()" class="text-emerald-600 hover:text-emerald-800">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @endif

                    <!-- table wrapper dengan overflow otomatis untuk mobile -->
                    <div class="table-wrapper overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th scope="col" class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                        NIM
                                    </th>
                                    <th scope="col" class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                        Nama Mahasiswa
                                    </th>
                                    <th scope="col" class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                                        Jurusan
                                    </th>
                                    <th scope="col" class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-600 w-36">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 bg-white">
                                @forelse ($mahasiswa as $m)
                                <tr class="hover:bg-slate-50/80 transition-colors duration-150 group">
                                    <td class="whitespace-nowrap px-5 py-4 text-sm font-mono font-medium text-slate-700">
                                        {{ $m->nim }}
                                    </td>
                                    <td class="whitespace-nowrap px-5 py-4 text-sm font-semibold text-slate-800">
                                        {{ $m->nama }}
                                    </td>
                                    <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-600">
                                        <span class="inline-flex rounded-full bg-indigo-50 px-3 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-200">
                                            {{ $m->jurusan->nama_jurusan }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-5 py-4 text-sm text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('mahasiswa.edit', $m->id) }}" class="inline-flex items-center justify-center rounded-lg bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700 ring-1 ring-inset ring-amber-300 hover:bg-amber-100 transition-all duration-200 group-hover:shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 -ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus mahasiswa {{ addslashes($m->nama) }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 ring-1 ring-inset ring-red-300 hover:bg-red-100 transition-all duration-200 group-hover:shadow-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 -ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-5 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center gap-3">
                                            <div class="rounded-full bg-slate-100 p-4">
                                                <svg class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586M4 13v5m8-3v6m0 0H7m5 0h5" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-base font-medium text-slate-500">Belum ada data mahasiswa</p>
                                                <p class="text-sm text-slate-400 mt-1">Silakan klik tombol "Tambah Mahasiswa" untuk mulai menambahkan</p>
                                            </div>
                                            <a href="{{ route('mahasiswa.create') }}" class="mt-2 inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
                                                + Tambah Sekarang
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- optional pagination info jika diperlukan (tinggal sesuaikan dengan paginate) -->
                    @if(method_exists($mahasiswa, 'links') && $mahasiswa->hasPages())
                        <div class="mt-6 border-t border-slate-200 pt-5 flex justify-center">
                            {{ $mahasiswa->links() }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- footer kecil atau credits (opsional) -->
            <div class="text-center text-xs text-slate-400 mt-6">
                Sistem Informasi Mahasiswa | data terkini
            </div>
        </div>
    </div>

    <!-- confirm delete universal option: menggunakan sweet alert style? sudah confirm bawaan -->
    <script>
        // optional: auto close alert setelah 4 detik
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
        });
    </script>
</div>

</x-app-layout>
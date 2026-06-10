<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::with('jurusan')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::select('id_jurusan', 'nama_jurusan')->get();
        $matakuliah = Matakuliah::select('id', 'nama_matakuliah', 'sks', 'id_jurusan');
        return view('mahasiswa.create', compact('jurusan', 'matakuliah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'id_jurusan' => 'required|exists:jurusan,id_jurusan'
        ]);

        Mahasiswa::create([
            'nim' => $validated['nim'],
            'nama' => $validated['nama'],
            'id_jurusan' => $validated['id_jurusan'],
        ]);

        return redirect()->route('mahasiswa.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $jurusan = Jurusan::all();
        $matakuliah = Matakuliah::all();

        return view('mahasiswa.edit', compact('mahasiswa', 'jurusan', 'matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'id_jurusan' => 'required|exists:jurusan,id_jurusan',
        ]);

        $mahasiswa->update($validated);

        $mahasiswa->matakuliah()->sync($request->matakuliah ?? []);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function print()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.print', compact('mahasiswa'));
    }


    public function exportExcel()
    {
        $mahasiswa = Mahasiswa::all();

        return response()
            ->view('mahasiswa.export', compact('mahasiswa'))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename=mahasiswa.xls');
    }
}

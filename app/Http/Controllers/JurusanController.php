<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required',
            'akreditasi' => 'required'
        ]);

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'akreditasi' => $request->akreditasi
        ]);

        return redirect()->route('jurusan.index')
            ->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {

        $request->validate([
            'nama_jurusan' => 'string'
        ]);

        $jurusan->update($request->all());

        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()->route('jurusan.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function print()
    {
        $jurusan = Jurusan::all();
        return view('jurusan.print', compact('jurusan'));
    }

    public function exportExcel()
    {
        $jurusan = Jurusan::all();

        return response()
            ->view('jurusan.export', compact('jurusan')) // Pastikan nama file Blade-nya: export.blade.php
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename=jurusan.xls'); // Diubah dari .xlsx ke .xls
    }
}

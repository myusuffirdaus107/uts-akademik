<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mahasiswa\getMahasiswa;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaApi extends Controller
{
    function index()
    {
        $mahasiswa = Mahasiswa::with('jurusan')->get();

        if ($mahasiswa->isEmpty()) {
            return response()->json([
                'status' =>404,
                'success' => false,
                'message' => 'Data mahasiswa tidak ditemukan'
            ], 404);
        }

        return getMahasiswa::collection($mahasiswa);
    }

    public function show ($id)
    {
        $mahasiswa = Mahasiswa::with('jurusan')->where('id', $id )->first();

        if (!$mahasiswa) {
            return response()->json([
                'status' =>404,
                'success' => false,
                'message' => 'Data mahasiswa tidak ditemukan'
            ], 404);
        }

        return new getMahasiswa($mahasiswa);
    }

    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::create($request->all());

        return response()->json([
            'status' => 201,
            'success' => true,
            'message' => 'Data mahasiswa berhasil dibuat',
            'data' => new getMahasiswa($mahasiswa)
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'status' =>404,
                'success' => false,
                'message' => 'Data mahasiswa tidak ditemukan'
            ], 404);
        }

        $mahasiswa->update($request->all());

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Data mahasiswa berhasil diperbarui',
            'data' => new getMahasiswa($mahasiswa)
        ], 200);
    }

        public function destroy($id)
        {
            $mahasiswa = Mahasiswa::find($id);
    
            if (!$mahasiswa) {
                return response()->json([
                    'status' =>404,
                    'success' => false,
                    'message' => 'Data mahasiswa tidak ditemukan'
                ], 404);
            }
    
            $mahasiswa->delete();
    
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Data mahasiswa berhasil dihapus'
            ], 200);
        }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InternshipController extends Controller
{
    public function index()
    {
        return response()->json(Internship::with('student')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after:mulai',
        ], [
            'selesai.after' => 'Tanggal selesai harus setelah tanggal mulai.'
        ]);

        $pkl = Internship::create($validated);

        return response()->json([
            'message' => 'Data PKL berhasil disimpan',
            'data' => $pkl,
        ], 201);
    }

    public function show($id)
    {
        $pkl = Internship::with('student')->find($id);

        if (!$pkl) {
            return response()->json(['message' => 'Data PKL tidak ditemukan'], 404);
        }

        return response()->json($pkl);
    }

    public function update(Request $request, Internship $pkl)
    {
        $validated = $request->validate([
            'siswa_id' => 'sometimes|required|exists:siswa,id',
            'mulai' => 'sometimes|required|date',
            'selesai' => 'sometimes|required|date|after:mulai',
        ]);

        $pkl->update($validated);

        return response()->json([
            'message' => 'Data PKL berhasil diperbarui',
            'data' => $pkl->fresh('student'),
        ]);
    }

    public function destroy(Internship $pkl)
    {
        $pkl->delete();

        return response()->json([
            'message' => 'Data PKL berhasil dihapus'
        ], 204);
    }
}

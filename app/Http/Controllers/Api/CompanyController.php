<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function index()
    {
        // Tampilkan semua data perusahaan dengan relasi mentor
        $industri = Company::with('mentor')->get();
        return response()->json($industri);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'bidang_usaha' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'guru_id' => [
                'required',
                'exists:guru,id',
                Rule::notIn(Company::pluck('guru_id')->filter()->toArray()), // Pastikan guru_id belum dipakai perusahaan lain
            ],
        ]);

        $industri = Company::create($validated);

        return response()->json([
            'message' => 'Data perusahaan berhasil disimpan',
            'data' => $industri->load('mentor'),
        ], 201);
    }

    public function show($id)
    {
        $industri = Company::with('mentor')->find($id);

        if (!$industri) {
            return response()->json(['message' => 'Data perusahaan tidak ditemukan'], 404);
        }

        return response()->json($industri);
    }

    public function update(Request $request, Company $industri)
    {
        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'bidang_usaha' => 'sometimes|required|string|max:255',
            'alamat' => 'sometimes|required|string|max:255',
            'kontak' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255',
            'guru_id' => [
                'sometimes',
                'required',
                'exists:guru,id',
                Rule::notIn(Company::where('id', '!=', $industri->id)->pluck('guru_id')->filter()->toArray()),
            ],
        ]);

        $industri->update($validated);

        return response()->json([
            'message' => 'Data perusahaan berhasil diperbarui',
            'data' => $industri->load('mentor'),
        ]);
    }

    public function destroy(Company $industri)
    {
        $industri->delete();

        return response()->json([
            'message' => 'Data perusahaan berhasil dihapus',
        ], 204);
    }
}

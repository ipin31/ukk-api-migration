<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MentorController extends Controller
{
    public function index()
    {
        return response()->json(Mentor::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gender' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'nip' => 'required|string|max:255|unique:guru,nip',
            'alamat' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $gurupembimbing = Mentor::create($validated);

        return response()->json([
            'message' => 'Data mentor berhasil disimpan',
            'data' => $gurupembimbing,
        ], 201);
    }

    public function show(Mentor $gurupembimbing)
    {
        return response()->json($gurupembimbing);
    }

    public function update(Request $request, Mentor $gurupembimbing)
    {
        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'gender' => ['sometimes', 'required', Rule::in(['Laki-laki', 'Perempuan'])],
            'nip' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('guru', 'nip')->ignore($gurupembimbing->id),
            ],
            'alamat' => 'sometimes|required|string|max:255',
            'kontak' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255',
        ]);

        $gurupembimbing->update($validated);

        return response()->json([
            'message' => 'Data mentor berhasil diperbarui',
            'data' => $gurupembimbing,
        ]);
    }

    public function destroy(Mentor $gurupembimbing)
    {
        $gurupembimbing->delete();

        return response()->json([
            'message' => 'Data mentor berhasil dihapus'
        ], 204);
    }
}

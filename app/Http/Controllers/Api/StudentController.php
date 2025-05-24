<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        return Student::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:siswa,nis',
            'gender' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'alamat' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:siswa,email',
            'status_pkl' => 'nullable|boolean',
        ]);

        $student = Student::create($validated);

        return response()->json([
            'message' => 'Data siswa berhasil disimpan',
            'data' => $student,
        ], 201);
    }

    public function show(Student $siswa)
    {
        return $siswa;
    }

    public function update(Request $request, Student $siswa)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => [
                'required', 'string', 'max:255',
                Rule::unique('siswa', 'nis')->ignore($siswa->id),
            ],
            'gender' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'alamat' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('siswa', 'email')->ignore($siswa->id),
            ],
            'status_pkl' => 'nullable|boolean',
        ]);

        $siswa->update($validated);

        return response()->json([
            'message' => 'Data siswa berhasil diperbarui',
            'data' => $siswa,
        ]);
    }

    public function destroy(Student $siswa)
    {
        $siswa->delete();

        return response()->json([
            'message' => 'Data siswa berhasil dihapus'
        ], 204);
    }
}

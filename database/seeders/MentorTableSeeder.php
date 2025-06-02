<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mentor;

class MentorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            ['nama' => 'Margaretha Endah Titisari, S.T', 'nip' => '1238126401', 'gender' => 'Perempuan', 'alamat' => 'Stembayo', 'kontak' => '1294701238', 'email' => 'margarethaendah@gmail.com'],
            ['nama' => 'Rr. Retna Trimantaraningsih, S.T', 'nip' => '1238122153', 'gender' => 'Perempuan', 'alamat' => 'Stembayo', 'kontak' => '1238122214', 'email' => 'retrnatrimantaraningsih@gmail.com'],
            ['nama' => 'Sugiarto, S.T', 'nip' => '12381227361', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '214861029634', 'email' => 'sugiarto@gmail.com'],
            ['nama' => 'Eka Nur Ahmad Romadhoni, S.Pd', 'nip' => '124785824', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '13641824658', 'email' => 'ekanur@gmail.com'],
            ['nama' => 'Yunianto Hermawan, S.Kom', 'nip' => '13954619569', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '39286592372', 'email' => 'yuniantohhermawan@gmail.com'],
            ['nama' => 'Ratna Yunitasari, S.T', 'nip' => '32857692136', 'gender' => 'Perempuan', 'alamat' => 'Stembayo', 'kontak' => '18375468136', 'email' => 'ratnayunitasari@gmail.com'],
        ];

        foreach ($teachers as $guru) {
            Mentor::create([
                'nama' => $guru['nama'],
                'nip' => $guru['nis'],
                'gender' => $guru['gender'],
                'alamat' => $guru['alamat'],
                'kontak' => $guru['kontak'],
                'email' => $guru['email'],
            ]);
        }
    }
}

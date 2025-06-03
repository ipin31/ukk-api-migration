<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            ['nama' => 'Abu Bakar Tsabit Ghufron', 'nis' => '20388', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '087715308060', 'email' => 'abubakar@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Ade Rafif Daneswara', 'nis' => '20389', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '08983688325', 'email' => 'aderafif@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Ade Zaidan Althaf', 'nis' => '20390', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '087786760589', 'email' => 'adezaidan@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Adhwa Khalila Ramadhani', 'nis' => '20391', 'gender' => 'Perempuan', 'alamat' => 'Stembayo', 'kontak' => '081229104926', 'email' => 'adhwa@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Adnan Faris', 'nis' => '20392', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '088226929178', 'email' => 'adnanfaris@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Ahmad Hanaffi Rahmadhani', 'nis' => '20393', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '089648576347', 'email' => 'ahmadhanaffi@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Akbar Adha Kusumawardhana', 'nis' => '20394', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '089514958932', 'email' => 'akbaradha@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Andhika August Farnaz', 'nis' => '20395', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '081227225178', 'email' => 'andhikaaugust@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Angelina Thithis Sekar Langit', 'nis' => '20396', 'gender' => 'Perempuan', 'alamat' => 'Stembayo', 'kontak' => '081272353535', 'email' => 'angelinasekar@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Arifin Nur Ihsan', 'nis' => '20397', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '0895363298812', 'email' => 'arifinnur@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Arya Eka Rahmat Prasetyo', 'nis' => '20398', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '082265468133', 'email' => 'aryaeka@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Athiyya Haniifa', 'nis' => '20399', 'gender' => 'Perempuan', 'alamat' => 'Stembayo', 'kontak' => '08983689083', 'email' => 'athiyyahaniifa@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Aulia Maharani', 'nis' => '20400', 'gender' => 'Perempuan', 'alamat' => 'Stembayo', 'kontak' => '08988341272', 'email' => 'auliamaharani@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Bijak Putra Firmansyah', 'nis' => '20401', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '085171156942', 'email' => 'bijakputra@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Christian Jarot Ferdianndaru', 'nis' => '20402', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '088233981200', 'email' => 'christianjarot@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Daffa Arya Seta', 'nis' => '20403', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '0895380204873', 'email' => 'daffaaarya@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Dimas Bagus', 'nis' => '20404', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '085727266745', 'email' => 'dimasbagus@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Ekalaya Kemal', 'nis' => '20405', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '0859144775880', 'email' => 'ekalayakemal@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Fadly Athalla Fawwaz', 'nis' => '20406', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '085727818368', 'email' => 'fadlyathalla@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Faradilla Syifa Nur\'aini', 'nis' => '20407', 'gender' => 'Perempuan', 'alamat' => 'Stembayo', 'kontak' => '081229748960', 'email' => 'faradillasyifa@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Farcha Amalia Nugrahaini', 'nis' => '20408', 'gender' => 'Perempuan', 'alamat' => 'Stembayo', 'kontak' => '0895380761274', 'email' => 'farchaamalia@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Fauzan Adzima Kurniawan', 'nis' => '20409', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '0882003217664', 'email' => 'fauzanadzima@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Gabriel Possenti Genta', 'nis' => '20410', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '089634085990', 'email' => 'gabrielpossenti@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Gilang Nurhuda', 'nis' => '20411', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '085652318924', 'email' => 'gilangnurhuda@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Giselo Kristitanto', 'nis' => '20412', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '083840200260', 'email' => 'giselokristi@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Ilham Putra Mahendra', 'nis' => '20413', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '089669502796', 'email' => 'ilhamputra@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Intan Luvia Hisanah', 'nis' => '20414', 'gender' => 'Perempuan', 'alamat' => 'Stembayo', 'kontak' => '082323647690', 'email' => 'intanluvia@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Isnaini Nur Wahyuningsih', 'nis' => '20415', 'gender' => 'Perempuan', 'alamat' => 'Stembayo', 'kontak' => '081228973672', 'email' => 'isnainiwahyu@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Izzuddin Fayyedh Haq', 'nis' => '20416', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '085179749266', 'email' => 'izzuddinfayyedh@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Jardella Anggun Lavatektonia', 'nis' => '20417', 'gender' => 'Perempuan', 'alamat' => 'Stembayo', 'kontak' => '088232371724', 'email' => 'jardellaanggun@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Jeconia Vale Adyatma', 'nis' => '20418', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '087762411025', 'email' => 'jeconiaadya@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Kaysa Aqila Amta', 'nis' => '20419', 'gender' => 'Perempuan', 'alamat' => 'Stembayo', 'kontak' => '085741571381', 'email' => 'kayasaqila@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Kevin Andrea Geraldino', 'nis' => '20420', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '0895619132904', 'email' => 'kevinandrea@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Laurentius Daviano Maximus', 'nis' => '20421', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '085971765038', 'email' => 'laurentiusdaviano@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Marcellinus Christo Pradipta', 'nis' => '20422', 'gender' => 'Laki-laki', 'alamat' => 'Stembayo', 'kontak' => '089688361696', 'email' => 'marcellinuschristo@gmail.com', 'status_pkl' => 0, 'foto' => null],
            ['nama' => 'Meidinna Tiara Pramudhita', 'nis' => '20423', 'gender' => 'Perempuan', 'alamat' => 'Stembayo', 'kontak' => '089527110034', 'email' => 'meidinnatiara@gmail.com', 'status_pkl' => 0, 'foto' => null],
        ];


        foreach ($students as $siswa) {
            Student::create([
                'nama' => $siswa['nama'],
                'nis' => $siswa['nis'],
                'gender' => $siswa['gender'],
                'alamat' => $siswa['alamat'],
                'kontak' => $siswa['kontak'],
                'email' => $siswa['email'],
                'status_pkl' => $siswa['status_pkl'],
                'foto' => $siswa['foto'],

            ]);
        }
    }
}

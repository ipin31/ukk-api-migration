<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Abu Bakar Tsabit Ghufron', 'email' => 'abubakar@gmail.com'],
            ['name' => 'Ade Rafif Daneswara', 'email' => 'aderafif@gmail.com'],
            ['name' => 'Ade Zaidan Althaf', 'email' => 'adezaidan@gmail.com'],
            ['name' => 'Adhwa Khalila Ramadhani', 'email' => 'adhwa@gmail.com'],
            ['name' => 'Adnan Faris', 'email' => 'adnanfaris@gmail.com'],
            ['name' => 'Ahmad Hanaffi Rahmadhani', 'email' => 'ahmadhanaffi@gmail.com'],
            ['name' => 'Akbar Adha Kusumawardhana', 'email' => 'akbaradha@gmail.com'],
            ['name' => 'Andhika August Farnaz', 'email' => 'andhikaaugust@gmail.com'],
            ['name' => 'Angelina Thithis Sekar Langit', 'email' => 'angelinasekar@gmail.com'],
            ['name' => 'Arifin Nur Ihsan', 'email' => 'arifinnur@gmail.com'],
            ['name' => 'Arya Eka Rahmat Prasetyo', 'email' => 'aryaeka@gmail.com'],
            ['name' => 'Athiyya Haniifa', 'email' => 'athiyyahaniifa@gmail.com'],
            ['name' => 'Aulia Maharani', 'email' => 'auliamaharani@gmail.com'],
            ['name' => 'Bijak Putra Firmansyah', 'email' => 'bijakputra@gmail.com'],
            ['name' => 'Christian Jarot Ferdianndaru', 'email' => 'christianjarot@gmail.com'],
            ['name' => 'Daffa Arya Seta', 'email' => 'daffaaarya@gmail.com'],
            ['name' => 'Dimas Bagus', 'email' => 'dimasbagus@gmail.com'],
            ['name' => 'Ekalaya Kemal', 'email' => 'ekalayakemal@gmail.com'],
            ['name' => 'Fadly Athalla Fawwaz', 'email' => 'fadlyathalla@gmail.com'],
            ['name' => 'Faradilla Syifa Nur\'aini', 'email' => 'faradillasyifa@gmail.com'],
            ['name' => 'Farcha Amalia Nugrahaini', 'email' => 'farchaamalia@gmail.com'],
            ['name' => 'Fauzan Adzima Kurniawan', 'email' => 'fauzanadzima@gmail.com'],
            ['name' => 'Gabriel Possenti Genta', 'email' => 'gabrielpossenti@gmail.com'],
            ['name' => 'Gilang Nurhuda', 'email' => 'gilangnurhuda@gmail.com'],
            ['name' => 'Giselo Kristitanto', 'email' => 'giselokristi@gmail.com'],
            ['name' => 'Ilham Putra Mahendra', 'email' => 'ilhamputra@gmail.com'],
            ['name' => 'Intan Luvia Hisanah', 'email' => 'intanluvia@gmail.com'],
            ['name' => 'Isnaini Nur Wahyuningsih', 'email' => 'isnainiwahyu@gmail.com'],
            ['name' => 'Izzuddin Fayyedh Haq', 'email' => 'izzuddinfayyedh@gmail.com'],
            ['name' => 'Jardella Anggun Lavatektonia', 'email' => 'jardellaanggun@gmail.com'],
            ['name' => 'Jeconia Vale Adyatma', 'email' => 'jeconiaadya@gmail.com'],
            ['name' => 'Kaysa Aqila Amta', 'email' => 'kayasaqila@gmail.com'],
            ['name' => 'Kevin Andrea Geraldino', 'email' => 'kevinandrea@gmail.com'],
            ['name' => 'Laurentius Daviano Maximus', 'email' => 'laurentiusdaviano@gmail.com'],
            ['name' => 'Marcellinus Christo Pradipta', 'email' => 'marcellinuschristo@gmail.com'],
            ['name' => 'Meidinna Tiara Pramudhita', 'email' => 'meidinnatiara@gmail.com'],
            ['name' => 'Margaretha Endah Titisari, S.T', 'email' => 'margarethaendah@gmail.com'],
            ['name' => 'Rr. Retna Trimantaraningsih, S.T', 'email' => 'retrnatrimantaraningsih@gmail.com'],
            ['name' => 'Sugiarto, S.T', 'email' => 'sugiarto@gmail.com'],
            ['name' => 'Eka Nur Ahmad Romadhoni, S.Pd', 'email' => 'ekanur@gmail.com'],
            ['name' => 'Yunianto Hermawan, S.Kom', 'email' => 'yuniantohhermawan@gmail.com'],
            ['name' => 'Ratna Yunitasari, S.T', 'email' => 'ratnayunitasari@gmail.com'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('12345678'), // default password jika perlu
            ]);
        }
    }
}

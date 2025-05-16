<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $table = 'siswa';

     protected $fillable = [
          'nama',
          'nis',
          'gender',
          'alamat',
          'kontak',
          'email',
          'status_pkl',

     ];
     

}

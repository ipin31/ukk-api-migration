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
          'foto',

     ];

     public function getFotoUrlAttribute()
     {
          if (!empty($this->foto)) {
               return asset('storage/' . $this->foto);
          }
          return null;
     }

     public function internship()
     {
          return $this->hasOne(Internship::class, 'siswa_id');
     }
     

}

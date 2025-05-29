<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $table = 'pkl';

     protected $fillable = [
          'mulai',
          'selesai',
          'siswa_id',
          'industri_id',
     ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'siswa_id');
    }

    public function industri()
    {
        return $this->belongsTo(Company::class, 'industri_id');
    }

    protected static function booted()
    {
        static::created(function (Internship $internship) {
            $student = $internship->student;
            if ($student && $student->status_pkl != 1) {
                $student->updateQuietly([
                    'status_pkl' => 1,
                    'badge_lapor' => 'Sudah Lapor',
                ]);
            }
        });

        static::updated(function (Internship $internship) {
            $student = $internship->student;
            if ($student && $student->status_pkl != 1) {
                $student->updateQuietly([
                    'status_pkl' => 1,
                    'badge_lapor' => 'Sudah Lapor',
                ]);
            }
        });

        static::deleted(function (Internship $internship) {
            $student = $internship->student;
            if ($student) {
                $student->updateQuietly([
                    'status_pkl' => 0,
                    'badge_lapor' => 'Belum Lapor',
                ]);
            }
        });
    }


}

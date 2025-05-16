<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'industri';

    protected $fillable = [
        'nama',
        'bidang_usaha',
        'alamat',
        'kontak',
        'email',

    ];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'guru_id'); //Mentor = nama model dari tabel yang di relasikan, contoh : company ke mentor
    }
}

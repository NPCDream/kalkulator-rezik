<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable=[
        'nis30',
        'nama30',
        'jenis_kelamin30',
        'kelas30',
        'jurusan30',
        'alamat30',
    ];
}

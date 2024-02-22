<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kariawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'namakariawan',
        'alamat',
        'no',
    ];
}


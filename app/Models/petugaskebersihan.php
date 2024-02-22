<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petugaskebersihan extends Model
{
    use HasFactory;
    protected $fillable = [
        'namapetugaskebersihan',
        'alamat',
        'no',
    ];
}

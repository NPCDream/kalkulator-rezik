<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gajipetugaskebersihan extends Model
{
    use HasFactory;
    protected $fillable = [
        'namapetugaskebersihan',
        'gaji',
    ];
}

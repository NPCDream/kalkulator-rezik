<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundrie extends Model
{
    use HasFactory;
    protected $fillable = [
        'beratpakaian',
        'hargaperkilo',
        'alamat',
    ];
}

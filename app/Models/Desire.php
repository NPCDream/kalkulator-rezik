<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desire extends Model
{
    use HasFactory;
    protected $fillable = [
    'nama', 'rider','id_core'
    ];
}

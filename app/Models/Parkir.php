<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    use HasFactory;
    protected $table = 'parkirs';
    protected $fillable = [
        'nopol',
        'jam_masuk',
        'jam_keluar',
        'biaya_parkir',
    ];
}

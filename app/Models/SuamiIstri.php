<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuamiIstri extends Model
{
    use HasFactory;
    protected $table = 'suami_istris';
    protected $fillable = [
        'user_id',
        'nama_si',
        'status_si',
        'pekerjaan',
        't_lahir',
        'tgl_lahir',
        'status_tunjangan',
        'umur',
        'no_hp',
    ];

    public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }
}

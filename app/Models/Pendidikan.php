<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $table = 'pendidikans';
    protected $fillable = [
            'user_id',
            'no_ijazah',
            'tgl_ijazah',
            'tingkat_pendidikan',
            'lembaga_pendidikan',
            'jurusan',
            'kota',
            'tahun_lulus',
        ];

        public function users()
        {
            return $this->belongsTo(User::class);
        }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepegawaian extends Model
{
    use HasFactory;
    protected $table = 'kepegawaians';
    protected $fillable = [
            'user_id',
            'pangkat',
            'golongan',
            'jabatan',
            'jenis_jabatan',
            'status_pegawai',
            'masa_kerja',
            'gaji',
            'satuan_kerja',
            'nomor_sk_cpns',
            'tgl_sk_cpns',
            'nomor_sk_pns',
            'tgl_sk_pns',
            'no_karpeg',
        ];

        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

        public function naikBerkala()
        {
            return $this->hasOne(naikBerkala::class);
        }

        public function naikPankat()
        {
            return $this->hasOne(naikPankat::class);
        }
}

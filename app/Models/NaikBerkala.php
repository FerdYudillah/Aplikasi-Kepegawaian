<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NaikBerkala extends Model
{
    use HasFactory;

    protected $table = 'naik_berkalas';
    protected $fillable = [
        'user_id',
        'gaji_id',
        'mulai_tanggal',
        'naik_selanjutnya',
        'tgl_usulan',
        ];

    public function user_pegawai()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gaji()
    {
        return $this->belongsTo(Gaji::class, 'gaji_id');
    }

    public function kepegawaian()
    {
        return $this->belongsTo(Kepegawaian::class, 'gaji_id');
    }
}

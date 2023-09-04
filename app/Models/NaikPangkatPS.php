<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NaikPangkatPS extends Model
{
    use HasFactory;
    protected $table = 'naik_pangkat_p_s';
    protected $fillable = [
        'user_id',
        'pangkat_id',
        'mulai_tanggal',
        'naik_selanjutnya',
        'tgl_usulan',
        'link',
        ];

        public function user_pegawai()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

        public function kepegawaian()
    {
        return $this->belongsTo(Kepegawaian::class);
    }

    public function pangkat_pns()
    {
        return $this->belongsTo(Pangkat::class, 'pangkat_id', 'id_pangkat');
    }
}

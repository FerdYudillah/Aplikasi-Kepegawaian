<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NaikPangkat extends Model
{
    use HasFactory;
    protected $table = 'naik_pangkats';
    protected $fillable = [
        'user_id',
        'pangkat_id',
        'mulai_tanggal',
        'naik_selanjutnya',
        'tgl_usulan',
        'link','jenis_usulan',
        'gol_baru','jabatan'
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

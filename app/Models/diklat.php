<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class diklat extends Model
{
    use HasFactory;

    protected $table = 'diklats';
    protected $fillable = [
            'user_id', 'nama_diklat',
            'penyelenggara',
            'tempat_diklat',
            'tgl_pelaksanaan',
            'tgl_selesai',
            'no_sttpl',
            'ttd_pejabat',
            'status_diklat',
        ];


        public function User() : BelongsTo
        {
            return $this->belongsTo(User::class);
        }
}

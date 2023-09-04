<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    use HasFactory;
    protected $table = 'pangkats';
    protected $fillable = [
            'nama_pangkat'
        ];

        public function naikPangkat()
        {
            return $this->hasMany(NaikPangkat::class, 'pangkat_id', 'id_pangkat');
        }
}
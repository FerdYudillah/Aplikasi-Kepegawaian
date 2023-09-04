<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gaji extends Model
{
    use HasFactory;
    protected $table = 'gajis';
    protected $fillable = [
            'golongan',
            'masa_kerja',
            'gaji_pokok',
            'tahun',
        ];


        public function User() : BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function naikBerkala()
        {
            return $this->hasMany(NaikBerkala::class);
        }



}

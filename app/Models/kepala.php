<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kepala extends Model
{
    use HasFactory;
    protected $table = 'kepalas';
    protected $fillable = [
            'user_id',
            'nip',
            'name',
            'pangol',
        ];

        public function user()
        {
            return $this->belongsTo(User::class);
        }

}

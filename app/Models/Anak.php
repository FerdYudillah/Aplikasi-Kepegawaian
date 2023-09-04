<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Anak extends Model
{
    use HasFactory;
    protected $table = 'anaks';
    protected $fillable = [
        'user_id',
        'nama_anak',
        'status_anak',
        'umur',
        't_lahir',
        'tgl_lahir',
        'status_tunjangan',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

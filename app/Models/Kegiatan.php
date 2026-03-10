<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'tanggal',
    'uraian',
    'output',
    'jam_mulai',
    'jam_selesai',
    'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

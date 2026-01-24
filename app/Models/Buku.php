<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    /** @use HasFactory<\Database\Factories\BukuFactory> */
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'judul_buku',
        'penulis',
        'tanggal_rilis',
        'mentor_id',
        'siswa_id',
    ];
    public function mentor(){
        return $this->belongsTo(Mentor::class);
    }
    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }
}

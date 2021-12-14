<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'anggota_1', 'anggota_2', 'jenis_program', 'judul_program', 'nama_file', 'status', 'link_jurnal', 'judul_jurnal', 'link_luaran_1', 'link_luaran_2', 'pesan'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

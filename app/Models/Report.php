<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'name',
        'id_user',
        'nik',
        'nohp',
        'tujuan',
        'tanggal',
        'deskripsi',
        'gambar',
        'status'
    ];
}

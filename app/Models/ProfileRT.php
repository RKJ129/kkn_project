<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileRT extends Model
{
    use HasFactory;

    protected $table = 'profile_rt';
    protected $fillable = ['img', 'name', 'sambutan', 'visi', 'misi', 'deskripsi', 'deskripsi_kost', 'jumlah_penduduk'];
}

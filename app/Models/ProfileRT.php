<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileRT extends Model
{
    use HasFactory;

    protected $table = 'profile_rt';
    protected $fillable = ['img', 'name', 'sambutan', 'deskripsi', 'jumlah_penduduk'];

    public function getImgAttribute($value) {
        if($value == null) {
            return null;
        }
        return "/storage/profile/" . $value;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = "Berita";
    protected $fillable = ["judul", "description", "img"];

    public function getImgAttribute($value) {
        if($value == null) {
            return null;
        }
        return "/storage/berita/" . $value;
    }
}

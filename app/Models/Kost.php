<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;

    protected $table = "kost";
    protected $fillable = ["name", "harga", "alamat", "description", "kontak", "img"];

    public function getImgAttribute($value) {
        if($value == null) {
            return null;
        }
        return "/storage/kost/" . $value;
    }
}

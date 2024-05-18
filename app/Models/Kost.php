<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;

    protected $table = "kost";
    protected $fillable = ["name", "harga", "alamat", "description", "kontak", "img", "jenis"];

    public function getHargaAttribute($value) {
        return 'Rp. ' . number_format($value, 0, ',', '.');
    }

    public function getKontakAttribute($value) {
        return str_pad($value, 12, "0", STR_PAD_LEFT);
    }
}

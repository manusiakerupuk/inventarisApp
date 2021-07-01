<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
        'nama',
        'satuan',
        'ukuran'
    ];

    public function bukuBarang() {
        return $this->hasMany(bukubarang::class);
    }
}

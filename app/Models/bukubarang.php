<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\barang;

class bukubarang extends Model
{
    use HasFactory;
    protected $table = 'bukubarangs';
    protected $guarded = [];

    public function barang() {
        return $this->belongsTo(barang::class);
    }
}

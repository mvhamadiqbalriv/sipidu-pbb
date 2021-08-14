<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas_bangunan extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_bangunan';

    protected $guarded = ['id'];

    function objek_pajak(){
        return $this->belongsTo(Objek_pajak::class, 'objek_pajak_id', 'id');
    }
}

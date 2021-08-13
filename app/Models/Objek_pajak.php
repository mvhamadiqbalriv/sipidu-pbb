<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objek_pajak extends Model
{
    use HasFactory;

    protected $table = 'objek_pajak';

    protected $guarded = [
        'id'
    ];

    function desa(){
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }

    function kecamatan(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}

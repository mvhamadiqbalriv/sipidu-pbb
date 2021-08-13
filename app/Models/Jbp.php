<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jbp extends Model
{
    use HasFactory;

    protected $table = 'jbp';

    protected $guarded = ['id'];

    public function fasilitas_bangunan(){
        return $this->belongsTo(Fasilitas_bangunan::class, 'fasilitas_bangunan_id', 'id');
    }
}

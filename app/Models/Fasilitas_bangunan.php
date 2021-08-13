<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas_bangunan extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_bangunan';

    protected $guarded = ['id'];
}

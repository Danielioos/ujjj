<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kapcsolat extends Model
{
    protected $table = 'kapcsolat';
    public $timestamps = false;
    protected $fillable = ['nev', 'email', 'uzenet', 'datum'];
    protected $casts = ['datum' => 'datetime'];
}

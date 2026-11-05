<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Processzor extends Model
{
    protected $table = 'processzor';
    public $timestamps = false;
    protected $guarded = [];

    public function gepek()
    {
        return $this->hasMany(Gep::class, 'processzorid', 'id');
    }
}

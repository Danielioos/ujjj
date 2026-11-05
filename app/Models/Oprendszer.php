<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oprendszer extends Model
{
    protected $table = 'oprendszer';
    public $timestamps = false;
    protected $guarded = [];

    public function gepek()
    {
        return $this->hasMany(Gep::class, 'oprendszerid', 'id');
    }
}

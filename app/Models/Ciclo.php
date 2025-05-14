<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected $fillable = [
        'name',
    ];

    public function cicloFormativo()
    {
        return $this->hasMany(CicloFormativo::class);
    }
}

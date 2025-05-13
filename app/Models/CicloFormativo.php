<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CicloFormativo extends Model
{
    protected $fillable = [
        'name',
        'level',
        'description',
        'profesionalfamily',
        'valuation',
        'personalopnion',
        'category_id',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }	
    public function category()
    {
        return $this->belongsTo(Ciclo::class);
    }
    
}

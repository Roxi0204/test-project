<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CicloFormativo extends Model
{
    protected $fillable = [
        'name',
        'level',
        'description',
        'valuation',
        'personalopinion',
        'email_contact',
        'ciclos_id',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }	
    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class, 'ciclos_id');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class privolitev extends Model
{
    use HasFactory;
    //Preveri varnost?
    // protected $table = 'ime tabele' // v primeru dručačnega imena tabele 

    public function stanje_soglasja()
    {
         return $this->belongsToMany(Stanje_soglasja::class);//preveri 
    }
}


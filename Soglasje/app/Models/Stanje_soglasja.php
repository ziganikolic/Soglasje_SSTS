<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stanje_soglasja extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'privolitev_id',
        'izbira',
    ];

    protected $casts = [
        'izbira' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

}

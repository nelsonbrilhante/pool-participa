<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Voter extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'id_number',
        'name',
        'region',
        'has_voted',
    ];

    public function votes()
    {
        return $this->belongsToMany(Option::class, 'votes')->withTimestamps();
    }
}

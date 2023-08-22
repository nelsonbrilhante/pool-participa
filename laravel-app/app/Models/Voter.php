<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // Import this

class Voter extends Authenticatable // Extend Authenticatable instead of Model
{
    use HasFactory;

    protected $fillable = ['id_number', 'name', 'table', 'has_voted'];

    public function votes()
    {
        return $this->belongsToMany(Option::class, 'votes')->withTimestamps();
    }

}

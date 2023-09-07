<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'poll_id',
        'voted_at',
        'region',
        'option_id',
    ];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'poll_id',
        'description',
        'vote_count',
        'project_number', // This field was added based on your form data.
        'owner',          // This field was added based on your form data.
        'theme',          // This field was added based on your form data.
        'amount'          // This field was added based on your form data.
    ];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
}

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
        'project_number',
        'owner',
        'theme',
        'amount',
    ];


    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

    public function voters()
    {
        return $this->belongsToMany(Voter::class, 'votes')->withTimestamps();
    }

    public function optionsSortedByVotes()
    {
        return $this->hasMany(Option::class)->orderByDesc('vote_count');
    }


}

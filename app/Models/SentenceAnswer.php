<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentenceAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sentence_id',
        'answer',
        'is_correct'
    ];

    public function sentence()
    {
        return $this->belongsTo('App\Models\Sentence');
    }
}

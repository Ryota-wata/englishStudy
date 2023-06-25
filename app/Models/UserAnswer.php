<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'word_id',
        'answer',
        'is_correct'
    ];

    public function word()
    {
        return $this->belongsTo('App\Models\Word');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'question';
    protected $fillable = [
        'game_id',
        'content',
//        'topic_id',
        'correct_answer',
        'score',
        'create_by',
    ];

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }
}

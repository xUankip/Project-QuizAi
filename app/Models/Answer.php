<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table = 'answer';
    protected $fillable = [
        'question_id',
        'answer',
        'answer_content	',
        'correct_answer',
    ];
}

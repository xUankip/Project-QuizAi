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
        'correct_answer',
        'score',
        'created_by',
        'updated_by',
    ];

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }
}

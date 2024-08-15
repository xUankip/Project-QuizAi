<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'game';
    protected $fillable = [
        'name',
        'description',
        'cover_img',
        'topic_id',
        'created_by',
        'updated_by',
    ];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function topic()
    {
        return $this->belongsTo('App\Models\Topic');
    }
}

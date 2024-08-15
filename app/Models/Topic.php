<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $table = 'topic';
    protected $fillable = [
        'name',
        'description',
        'thumbnail_url',
        'created_by',
        'updated_by',
    ];
}

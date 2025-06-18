<?php

// app/Models/QuizResult.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $fillable = [
        'category_id', 'score', 'total',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

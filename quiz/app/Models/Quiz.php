<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';

    protected $fillable = [
        'title',
        'description',
        'finished'
    ];

    protected $date = ['finished'];

    public function getFinishedAttribute($date){
        return $date ? Carbon::parse($date) : null;
    }


    public function question()
    {
        return $this->hasMany(Question::class);
    }
}

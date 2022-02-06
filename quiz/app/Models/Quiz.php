<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Quiz extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'quizzes';

    protected $fillable = [
        'title',
        'description',
        'finished',
        'status',
        'slug'
    ];

    protected $date = ['finished'];

    public function getFinishedAttribute($date){
        return $date ? Carbon::parse($date) : null;
    }


    public function question()
    {
        return $this->hasMany(Question::class);
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'onUpdate' => true,
                'source' => 'title'
            ]
        ];
    }

}

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

    protected $appends = ['details'];


    public function getDetailsAttribute()
    {
        return [
            'average' => round($this->results()->avg('point')),
            'join_count' => $this->results()->count()
        ];
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function my_result()
    {
        return $this->hasOne(Result::class)->where('user_id', auth()->user()->id);
    }

    public function getFinishedAttribute($date)
    {
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

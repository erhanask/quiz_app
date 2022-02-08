<?php

namespace Database\Factories;

use App\Models\Answers;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswersFactory extends Factory
{

    protected $model = Answers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,5),
            'question_id' => rand(1,10),
            'answer' => rand(1,4),
        ];
    }
}

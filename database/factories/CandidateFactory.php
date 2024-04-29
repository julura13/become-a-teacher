<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Candidate;

class CandidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'date_of_birth' => $this->faker->dateTime(),
            'university' => $this->faker->word,
            'gender' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'opt_in' => $this->faker->boolean,
        ];
    }
}

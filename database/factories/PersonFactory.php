<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Person::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstname,                
            'middle_name' => $this->faker->lastname,
            'last_name' => $this->faker->lastname,
            'birth_date' => $this->faker->date,
        ];
    }
}

<?php

namespace Database\Factories;

use LaraZeus\Core\Models\Form;
use LaraZeus\Core\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->words(3, true),
            'form_id' => Form::factory(),
            'ordering' => $this->faker->numberBetween(1,10),
        ];
    }
}

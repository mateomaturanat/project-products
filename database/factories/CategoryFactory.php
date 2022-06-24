<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Illuminate\Support\Str as Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker=Faker::create();
        $name=$faker->company;
        $slug=Str::slug($name);
        return [
            'name'=>$name,
            'description'=>$this->faker->text,
            'priority'=>$this->faker->numberBetween(1,4),
            'slug'=>$slug
        ];
    }
}

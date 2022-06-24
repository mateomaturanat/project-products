<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $instance=DB::table('categories')->inRandomOrder()->first();
        //$faker=Faker::create();
        //$name=$faker->company;
        //$slug=Str::slug($name);
        return [

            'name'=>$this->faker->company,
            'description'=>$this->faker->text,
            'priority'=>$this->faker->numberBetween(1,3),
            'category_id'=>$instance->id,
            'url_image'=>$this->faker->imageUrl(),
            'value'=>$this->faker->randomFloat(),
            //'slug'=>$slug
        ];
    }
}

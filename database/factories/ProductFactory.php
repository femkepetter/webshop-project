<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id'   => random_int(1, 10),
            'product_types_id'   => random_int(1, 2),
            'name'          => $this->faker->lastName(),
            'price'         => $this->faker->numberBetween(0, 100),
            'color'         => $this->faker->word(),
            'size'          => $this->faker->numberBetween(0, 100),
            'description'   => $this->faker->sentence(),
        ];
    }
}

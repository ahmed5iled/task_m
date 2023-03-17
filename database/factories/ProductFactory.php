<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(5, true),
            'short_description' => $this->faker->sentence(45),
            'long_description' => $this->faker->sentence(100),
            'barcode' => $this->faker->randomNumber(5),
            'price' => $this->faker->randomNumber(2),
            'quantity' => $this->faker->randomNumber(1),
            'offer' => 'yes',
            'most_view' => 'yes',
            'new_arrival' => 'yes',
            'category_id' => 1,
            'brand_id' => 1,
            'image' => $this->faker->imageUrl(640, 480, 'medical', true),

        ];
    }
}

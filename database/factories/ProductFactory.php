<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product_name = $this->faker->unique()->words($nb = 26, $asText = true);
        $slug = Str::slug($product_name);
        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_description' => $this->faker->text(100),
            'description' => $this->faker->text(300),
            'regular_price' => $this->faker->numberBetween(100, 500),
            'sale_price' => $this->faker->numberBetween(50, 300),
            'SKU' => 'PRD' . $this->faker->numberBetween(300, 1000),
            'stock_status' => 'in_stock',
            'quantity' => $this->faker->numberBetween(10, 50),
            'image' => 'product-' . $this->faker->numberBetween(1, 16),
            'category_id' => $this->faker->numberBetween(1, 5),

        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'existencia' => $this->faker->numberBetween(0,100),
            'precio' => $this->faker->numberBetween(0,100),
            'descripcion' => $this->faker->word(),
            'imagen' => $this->faker->imageUrl(450,300,'food',true),
        ];
    }
}

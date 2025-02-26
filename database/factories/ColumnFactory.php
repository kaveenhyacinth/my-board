<?php

namespace Database\Factories;

use App\Models\Board;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Column>
 */
class ColumnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['To Do', 'In Progress', 'Done', 'In Review', 'In QA']),
            'order' => fake()->numberBetween(1, 5),
            'board_id' => fake()->numberBetween(1, Board::count()),
        ];
    }
}

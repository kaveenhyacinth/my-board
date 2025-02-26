<?php

    namespace Database\Factories;

    use App\Models\Task;
    use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubTask>
     */
    class SubTaskFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                'title' => fake()->sentence(),
                'task_id' => fake()->numberBetween(1, Task::count())
            ];
        }
    }

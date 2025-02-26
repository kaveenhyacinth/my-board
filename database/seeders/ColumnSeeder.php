<?php

namespace Database\Seeders;

use App\Models\Column;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Column::factory()->create([
            'name' => 'To Do',
            'order' => 1,
            'board_id' => 1,
        ]);
        Column::factory()->create([
            'name' => 'In Progress',
            'order' => 2,
            'board_id' => 1,
        ]);
        Column::factory()->create([
            'name' => 'Done',
            'order' => 3,
            'board_id' => 1,
        ]);
    }
}

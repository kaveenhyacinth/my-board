<?php

    namespace Database\Seeders;

    use App\Models\User;
    use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'Password'
            ]);

            $this->call([
                BoardSeeder::class,
                ColumnSeeder::class,
                TaskSeeder::class,
                SubTaskSeeder::class,
            ]);
        }
    }

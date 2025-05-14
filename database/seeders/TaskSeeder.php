<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        // Tareas para el admin (ID 1)
        Task::factory()->count(5)->create([
            'user_id' => 1
        ]);

        // Tareas para el usuario normal (ID 2)
        Task::factory()->count(5)->create([
            'user_id' => 2
        ]);
    }
}

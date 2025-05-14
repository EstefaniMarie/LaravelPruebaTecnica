<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{

    //CREACION DE DATOS RANDOM PARA HACER PRUEBAS
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text(50),
            'due_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['pendiente', 'en progreso', 'completada']),
            'priority' => $this->faker->randomElement(['baja', 'media', 'alta']),
            'user_id' => 1,
        ];
    }
}

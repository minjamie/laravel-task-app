<?php
// database/factories/TaskFactory.php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'title' => $this->faker->text(50), // sentence -> text
            'description' => $this->faker->paragraph,
            'due_date' => $this->faker->date(),
            'completed' => $this->faker->boolean,
        ];
    }
}


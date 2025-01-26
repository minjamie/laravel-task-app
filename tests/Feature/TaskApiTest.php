<?php

// tests/Feature/TaskApiTest.php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a new task
     */
    public function test_create_task()
    {
        $response = $this->postJson('/tasks', [
            'title' => 'New Task',
            'description' => 'Task Description',
            'due_date' => '2025-01-30',
            'completed' => false,
        ]);

        $response->assertStatus(201); // Assert it was created
        $response->assertJson([
            'title' => 'New Task',
            'description' => 'Task Description',
        ]);
    }

    /**
     * Test fetching a list of tasks
     */
    public function test_get_tasks()
    {
        Task::factory()->create(); // Create a task using a factory

        $response = $this->getJson('/tasks');
        $response->assertStatus(200);
        $response->assertJsonStructure([ // Assert structure of returned tasks
            '*' => ['id', 'title', 'description', 'due_date', 'completed'],
        ]);
    }

    /**
     * Test fetching a task by id
     */
    public function test_get_task_by_id()
    {
        $task = Task::factory()->create([
            'title' => 'Test Task',
            'description' => 'Task Description',
            'completed' => false,
        ]);

        $response = $this->getJson("/tasks/{$task->id}");

        $response->assertStatus(200); // Assert OK
        $response->assertJson([
            'id' => $task->id,
            'title' => 'Test Task',
            'description' => 'Task Description',
            'completed' => false,
        ]);
    }

    /**
     * Test updating a task
     */
    public function test_update_task()
    {
        $task = Task::factory()->create();

        $response = $this->putJson("/tasks/{$task->id}", [
            'title' => 'Updated Task',
            'description' => 'Updated Description',
            'due_date' => '2025-02-01',
            'completed' => true,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'title' => 'Updated Task',
            'description' => 'Updated Description',
        ]);
    }

    /**
     * Test deleting a task
     */
    public function test_delete_task()
    {
        $task = Task::factory()->create();

        $response = $this->deleteJson("/tasks/{$task->id}");

        $response->assertStatus(204); // Assert no content (deleted)
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]); // Assert the task is deleted
    }
}

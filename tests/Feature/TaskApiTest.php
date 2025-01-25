namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_task()
    {
        $response = $this->postJson('/api/tasks', [
            'title' => 'Test Task',
            'description' => 'Task description',
            'due_date' => '2025-12-31',
            'completed' => false,
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'title' => 'Test Task',
                     'description' => 'Task description',
                     'due_date' => '2025-12-31',
                     'completed' => false,
                 ]);
    }

    public function test_can_get_tasks()
    {
        $task = Task::factory()->create();

        $response = $this->getJson("/api/tasks/{$task->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $task->id,
                     'title' => $task->title,
                     'description' => $task->description,
                     'due_date' => $task->due_date->toDateString(),
                     'completed' => $task->completed,
                 ]);
    }

    // 다른 CRUD 테스트 메서드도 추가
}

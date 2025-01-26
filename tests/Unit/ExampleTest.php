<?php
// tests/Unit/TaskTest.php

namespace Tests\Unit;

use App\Models\Task;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function test_task_is_complete_when_completed_is_true()
    {
        $task = Task::factory()->create(['completed' => true]);

        $this->assertTrue($task->completed);
    }

    public function test_task_is_not_complete_when_completed_is_false()
    {
        $task = Task::factory()->create(['completed' => false]);

        $this->assertFalse($task->completed);
    }
}

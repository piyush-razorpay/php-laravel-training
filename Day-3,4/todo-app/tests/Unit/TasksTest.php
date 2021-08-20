<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TasksTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_task() {

        $data = [
            'title' => 'buy milk',
            'description' => 'buy 1 litre milk'
        ];

        $this->post(route('tasks.store'), $data)
            ->assertStatus(201)
            ->assertJson([
                'data' => $data,
                'message' => 'task created successfully']
            );
    }

    public function test_store_task_validation_fail() {
        $data = [
            'title' => ""
        ];

        $this->post(route('tasks.store'), $data)
            -> assertStatus(422);
    }

    public function test_index_task() {
        $this->get(route('tasks.index'))
            ->assertStatus(200);
    }

    public function test_destroy_task() {
        $data =
            [
                'title' => 'sell books',
                'description' => 'sell old books'
            ];
        $task = Task::create(
            $data
        );

        $this->json('delete', "api/tasks/$task->id")
            ->assertStatus(200);
        $this->assertDatabaseMissing('tasks', $data);
    }

    public function test_update_task_status_transition_allowed() {
        $request = [
            'status' => 'In Progress'
        ];
        $data = [
            'title' => 'sell books',
            'description' => 'sell old books'
        ];

        $task = Task::create(
            $data
        );

        $this->json('patch', "api/tasks/$task->id", $request)
            ->assertStatus(200);
    }

    public function test_update_task_status_transition_not_allowed() {
        $request = [
            'status' => 'Done'
        ];
        $data = [
            'title' => 'sell books',
            'description' => 'sell old books'
        ];

        $task = Task::create(
            $data
        );

        $this->json('patch', "api/tasks/$task->id", $request)
            ->assertStatus(200)
            ->assertJson(['message' => "transition from status: Pending to status: Done is not allowed"]);
    }
}

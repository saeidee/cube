<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class TaskCompletionControllerTest
 * @package Tests\Feature
 * @coversDefaultClass \App\Http\Controllers\TaskCompletionController
 */
class TaskCompletionControllerTest extends TestCase
{
    use WithFaker, DatabaseTransactions;

    /**
     * @test
     * @covers ::__construct
     * @covers ::store
     */
    function it_should_mark_task_to_completed()
    {
        /** @var Task $task */
        $task = factory(Task::class)->create(['completed_at' => null]);

        $response = $this->post(route('tasks.mark-as-complete', [$task->id]));
        $response->assertStatus(Response::HTTP_CREATED)->assertJson(['message' => 'Successfully marked as complete']);
        $this->assertNotNull($task->refresh()->completed_at);
    }

    /**
     * @test
     * @covers ::destroy
     */
    function it_should_mark_the_task_to_incomplete()
    {
        /** @var Task $task */
        $task = factory(Task::class)->create();

        $response = $this->delete(route('tasks.mark-as-incomplete', [$task->id]));
        $response->assertOk()->assertJson(['message' => 'Successfully marked as incomplete']);
        $this->assertNull($task->refresh()->completed_at);
    }
}

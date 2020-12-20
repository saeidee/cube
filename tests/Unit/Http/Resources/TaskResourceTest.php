<?php

namespace Tests\Unit\Http\Resources;

use Tests\TestCase;
use App\Models\Task;
use App\Http\Resources\TaskResource;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class TaskResourceTest
 * @package Tests\Unit\Http\Resources
 * @coversDefaultClass \App\Http\Resources\TaskResource
 */
class TaskResourceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     * @covers ::toArray
     */
    function it_should_return_resource()
    {
        /** @var Task $task */
        $task = factory(Task::class)->create();
        $expectation = [
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
            'due_at' => $task->due_at->toDateTimeString(),
            'completed_at' => $task->completed_at->toDateTimeString(),
            'created_at' => $task->created_at->toDateTimeString(),
            'updated_at' => $task->updated_at->toDateTimeString(),
        ];

        $this->assertEquals($expectation, (new TaskResource($task))->resolve());
    }

    /**
     * @test
     * @covers ::toArray
     */
    function it_should_return_resource_with_default_values()
    {
        /** @var Task $task */
        $task = factory(Task::class)
            ->create(['due_at' => null, 'completed_at' => null, 'created_at' => null, 'updated_at' => null]);
        $expectation = [
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
            'due_at' => null,
            'completed_at' => null,
            'created_at' => null,
            'updated_at' => null,
        ];

        $this->assertEquals($expectation, (new TaskResource($task))->resolve());
    }
}

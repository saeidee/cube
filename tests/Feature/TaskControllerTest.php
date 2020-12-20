<?php

namespace Tests\Feature;

use Tests\TestCase;
use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class TaskControllerTest
 * @package Tests\Feature
 * @coversDefaultClass \App\Http\Controllers\TaskController
 */
class TaskControllerTest extends TestCase
{
    use WithFaker, DatabaseTransactions;

    /**
     * @test
     * @covers ::__construct
     * @covers ::index
     */
    function it_should_return_paginated_tasks()
    {
        $tasks = factory(Task::class)->create();

        $response = $this->get(route('tasks.index'));
        $response->assertOk()->assertJsonFragment($tasks->toArray());
    }

    /**
     * @test
     * @covers ::store
     */
    function it_should_store_a_new_task()
    {
        $task = factory(Task::class)->raw(['due_at' => Carbon::tomorrow()->toDateTimeString(), 'completed_at' => null]);

        $response = $this->post(route('tasks.store'), $task);
        $response->assertStatus(Response::HTTP_CREATED)->assertJsonFragment($task);
        $this->assertDatabaseHas('tasks', $task);
    }

    /**
     * @test
     * @covers ::update
     */
    function it_should_update_the_given_task()
    {
        $title = $this->faker->title;
        $description = $this->faker->text;
        /** @var Task $task */
        $task = factory(Task::class)->create();

        $response = $this->put(route('tasks.update', [$task->id]), compact('title', 'description'));
        $response->assertOk()->assertJson(['message' => 'Successfully updated']);
        $this->assertDatabaseHas('tasks', compact('title', 'description'));
    }

    /**
     * @test
     * @covers ::show
     */
    function it_should_show_specific_task_by_given_id()
    {
        /** @var Task $task */
        $task = factory(Task::class)->create();

        $response = $this->get(route('tasks.show', [$task->id]));
        $response->assertOk()->assertJsonFragment($task->toArray());
    }

    /**
     * @test
     * @covers ::destroy
     */
    function it_should_delete_specific_task_by_given_id()
    {
        /** @var Task $task */
        $task = factory(Task::class)->create();

        $response = $this->delete(route('tasks.destroy', [$task->id]));
        $response->assertOk()->assertJson(['message' => 'Successfully deleted']);
        $this->assertSoftDeleted('tasks', $task->toArray());
    }
}

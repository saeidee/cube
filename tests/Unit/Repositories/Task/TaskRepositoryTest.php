<?php

namespace Tests\Unit\Repositories\Task;

use Mockery;
use App\Models\Task;
use Tests\TestCase;
use Mockery\MockInterface;
use App\Repositories\Task\TaskRepository;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class TaskRepositoryTest
 * @package Tests\Unit\Repositories\Task
 * @coversDefaultClass \App\Repositories\Task\TaskRepository
 */
class TaskRepositoryTest extends TestCase
{
    use WithFaker;

    /** @var TaskRepositoryInterface */
    private $repository;
    /** @var Task|MockInterface */
    private $task;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->task = Mockery::mock(Task::class);
        $this->repository = new TaskRepository($this->task);
    }

    /**
     * @test
     * @covers ::__construct
     * @covers ::findById
     */
    function it_should_return_task_by_id()
    {
        $task = factory(Task::class)->make();
        $id = $this->faker->randomDigitNotNull;

        $this->task->shouldReceive('find')->once()->with($id)->andReturn($task);

        $this->assertEquals($task, $this->repository->findById($id));
    }

    /**
     * @test
     * @covers ::findById
     */
    function it_should_return_null_when_the_given_task_id_not_exist()
    {
        $id = $this->faker->randomDigitNotNull;

        $this->task->shouldReceive('find')->once()->with($id)->andReturnNull();

        $this->assertNull($this->repository->findById($id));
    }

    /**
     * @test
     * @covers ::all
     */
    function it_should_return_all_paginated_tasks()
    {
        $paginatedTasks = Mockery::mock(LengthAwarePaginator::class);

        $this->task->shouldReceive('paginate')->once()->andReturn($paginatedTasks);

        $this->assertEquals($paginatedTasks, $this->repository->all());
    }

    /**
     * @test
     * @covers ::save
     */
    function it_should_save_new_task_with_the_given_fields()
    {
        $fields = factory(Task::class)->raw();

        $this->task->shouldReceive('create')->once()->andReturn(new Task());

        $this->assertInstanceOf(Task::class, $this->repository->save($fields));
    }

    /**
     * @test
     * @covers ::update
     */
    function it_should_update_task_with_the_given_fields()
    {
        $isUpdated = $this->faker->boolean;
        $fields = factory(Task::class)->raw();
        $id = $this->faker->randomDigitNotNull;
        /** @var TaskRepository|MockInterface $repository */
        $repository = Mockery::mock(TaskRepository::class)->makePartial();

        $repository->shouldReceive('findById')->once()->with($id)->andReturn($this->task);
        $this->task->shouldReceive('update')->once()->with($fields)->andReturn($isUpdated);

        $this->assertEquals($isUpdated, $repository->update($fields, $id));
    }

    /**
     * @test
     * @covers ::delete
     */
    function it_should_delete_task_with_the_given_id()
    {
        $isUpdated = $this->faker->boolean;
        $id = $this->faker->randomDigitNotNull;
        /** @var TaskRepository|MockInterface $repository */
        $repository = Mockery::mock(TaskRepository::class)->makePartial();

        $repository->shouldReceive('findById')->once()->with($id)->andReturn($this->task);
        $this->task->shouldReceive('delete')->once()->andReturn($isUpdated);

        $this->assertEquals($isUpdated, $repository->delete($id));
    }
}

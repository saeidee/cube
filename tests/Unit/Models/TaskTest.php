<?php

namespace Tests\Unit\Models;

use Mockery;
use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Task;
use Mockery\MockInterface;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * Class TaskTest
 * @package Tests\Unit\Models
 * @coversDefaultClass \App\Models\Task
 */
class TaskTest extends TestCase
{
    use WithFaker;

    /** @var Task|MockInterface */
    private $task;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->task = Mockery::mock(Task::class)->makePartial();
    }

    /**
     * @test
     * @covers ::markAsComplete
     */
    function it_should_mark_the_task_as_complete()
    {
        Carbon::setTestNow('now');
        $isUpdated = $this->faker->boolean;

        $this->task->shouldReceive('save')->once()->andReturn($isUpdated);

        $this->assertEquals($isUpdated, $this->task->markAsComplete());
        $this->assertEquals(now()->toDateTimeString(), $this->task->completed_at->toDateTimeString());
    }

    /**
     * @test
     * @covers ::markAsIncomplete
     */
    function it_should_mark_the_task_as_incomplete()
    {
        $isUpdated = $this->faker->boolean;

        $this->task->shouldReceive('save')->once()->andReturn($isUpdated);

        $this->assertEquals($isUpdated, $this->task->markAsIncomplete());
        $this->assertNull($this->task->completed_at);
    }
}

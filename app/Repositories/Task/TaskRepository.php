<?php

namespace App\Repositories\Task;

use App\Models\Task;

/**
 * Class TaskRepository
 * @package App\Repositories\Task
 */
class TaskRepository implements TaskRepositoryInterface
{
    private $task;

    /**
     * TaskRepository constructor.
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * @param array $fields
     * @return void
     */
    public function create(array $fields): void
    {
        $this->task->create($fields);
    }
}

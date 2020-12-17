<?php

namespace App\Repositories\Task;

use Exception;
use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
     * @param int $id
     * @return Task|null
     */
    public function findById(int $id): ?Task
    {
        return $this->task->find($id);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator
    {
        return $this->task->paginate();
    }

    /**
     * @param array $fields
     * @return Task
     */
    public function save(array $fields): Task
    {
        return $this->task->create($fields);
    }

    /**
     * @param array $fields
     * @param int $id
     * @return void
     */
    public function update(array $fields, int $id): void
    {
        $this->findById($id)->update($fields);
    }

    /**
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function delete(int $id): void
    {
        $this->findById($id)->delete();
    }
}

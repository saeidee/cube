<?php

namespace App\Repositories\Task;

use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Interface TaskRepositoryInterface
 * @package App\Repositories\Task
 */
interface TaskRepositoryInterface
{
    /**
     * @param int $id
     * @return Task|null
     */
    public function findById(int $id): ?Task;

    /**
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator;

    /**
     * @param array $fields
     * @return Task
     */
    public function save(array $fields): Task;

    /**
     * @param array $fields
     * @param int $id
     * @return void
     */
    public function update(array $fields, int $id): void;

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}

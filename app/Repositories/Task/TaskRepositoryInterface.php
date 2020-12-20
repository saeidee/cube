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
     * @return bool
     */
    public function update(array $fields, int $id): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}

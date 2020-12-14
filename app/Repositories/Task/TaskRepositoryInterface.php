<?php

namespace App\Repositories\Task;

/**
 * Interface TaskRepositoryInterface
 * @package App\Repositories\Task
 */
interface TaskRepositoryInterface
{
    /**
     * @param array $fields
     * @return void
     */
    public function create(array $fields): void;
}

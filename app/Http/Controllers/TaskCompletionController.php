<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Repositories\Task\TaskRepositoryInterface;

/**
 * Class TaskCompletionController
 * @package App\Http\Controllers
 */
class TaskCompletionController extends Controller
{
    private $taskRepository;

    /**
     * TaskCompletionController constructor.
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function store(int $id)
    {
        $task = $this->taskRepository->findById($id);
        $task->markAsComplete();

        return new JsonResponse(['message' => 'Successfully marked as complete'], Response::HTTP_CREATED);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        $task = $this->taskRepository->findById($id);
        $task->markAsIncomplete();

        return new JsonResponse(['message' => 'Successfully marked as incomplete'], Response::HTTP_OK);
    }
}

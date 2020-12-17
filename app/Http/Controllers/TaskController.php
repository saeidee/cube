<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\TaskResource;
use App\Http\Requests\Task\UpdateRequest;
use App\Http\Requests\Task\CreateRequest;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    private $taskRepository;

    /**
     * TaskController constructor.
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return TaskResource::collection($this->taskRepository->all());
    }

    /**
     * @param CreateRequest $request
     * @return TaskResource
     */
    public function store(CreateRequest $request)
    {
        return new TaskResource($this->taskRepository->save($request->validated()));
    }

    /**
     * @param int $id
     * @param UpdateRequest $request
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request)
    {
        $this->taskRepository->update($request->validated(), $id);

        return new JsonResponse(['message' => 'Successfully updated'], Response::HTTP_OK);
    }

    /**
     *
     * @param int $id
     * @return TaskResource
     */
    public function show(int $id)
    {
        return new TaskResource($this->taskRepository->findById($id));
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        $this->taskRepository->delete($id);

        return new JsonResponse(['message' => 'Successfully deleted'], Response::HTTP_OK);
    }
}

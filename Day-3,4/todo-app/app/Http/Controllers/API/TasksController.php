<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Services\TaskService;

class TasksController extends Controller
{

    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }



    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tasks = Task::paginate(10);
        return response($tasks, 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTaskRequest $request
     * @return JsonResponse
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->all());
        return response()->json([
            'data' => $task,
            'message' => 'task created successfully'], 201);
    }



    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @return JsonResponse
     */
    public function show(Task $task)
    {
        return response()->json([
            'data' => $task,
            'message' => 'success'
        ], 200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTaskRequest $request
     * @param Task $task
     * @return JsonResponse
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->taskService->validateStatusTransition($request, $task);

        $task->update(['status' => $request->status]);

        return response()->json(['message' => "task moved to - $request->status"]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return JsonResponse
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(['message' => 'task deleted successfully']);
    }
}

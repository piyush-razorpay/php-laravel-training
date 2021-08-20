<?php

namespace App\Http\Services;

use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaskService {
    function validateStatusTransition(UpdateTaskRequest $request, Task $task) {
        $isValidTransition = true;
        if (($request->status === "Done" && $task->status !== 'In Progress')
        || ($request->status === "In Progress" && $task->status !== 'Pending')) {
            $isValidTransition = false;
        }

        if ($request->status === $task->status) {
            throw new HttpResponseException(response()->json(['message' => "already in status: $task->status"]));
        }

        if (!$isValidTransition) {
            throw new HttpResponseException(response()->json(['message' => "transition from status: $task->status to status: $request->status is not allowed"]));
        }
    }
}

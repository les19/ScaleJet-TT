<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\TaskStoreRequest;
use App\Http\Resources\Tasks\TaskResource;
use App\Jobs\Tasks\DeleteTask;
use App\Models\Tasks\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TaskResource::collection(
            Task::orderByDesc('created_at')->get(),
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        return new TaskResource(
            Task::create(
                $request->safe()->toArray(),
            )
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        DeleteTask::dispatchSync($task);
    }
    
    public function finish(Task $task)
    {
        $task->finish();

        return new TaskResource($task);
    }
}

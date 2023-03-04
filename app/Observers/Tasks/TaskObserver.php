<?php

namespace App\Observers\Tasks;

use App\Jobs\Tasks\FinishLastTasksExceptTwo;
use App\Jobs\Tasks\FinishTask;
use App\Models\Tasks\Task;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        FinishTask::dispatchIf(config('tasks.tasks_auto_finish'), $task)
            ->delay(now()->addMinutes(
                config('tasks.tasks_auto_finish_time')
            ));

        FinishLastTasksExceptTwo::dispatchSync();
    }

}

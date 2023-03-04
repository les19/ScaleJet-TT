<?php

namespace App\Jobs\Tasks;

use App\Models\Tasks\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FinishLastTasksExceptTwo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // 1000 - kinda to much, I believe actually 1 should be enough, but just to be sure))
        $tasks = Task::unfinished()->skip(2)->take(1000)->orderByDesc('id')->get();

        $tasks->each(function (Task $task)
        {
            $task->finish();
        });
    }
}

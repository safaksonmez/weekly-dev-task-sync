<?php

namespace App\Console\Commands;

use App\Models\Provider;
use App\Models\Task;
use Illuminate\Console\Command;

class FetchTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch tasks from providers and store them in the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $providers = Provider::all();
            foreach ($providers as $provider) {
                $tasks = $provider->fetchTasks();
                foreach ($tasks as $task) {
                    Task::create([
                        'name' => $task[$provider->task_name_key],
                        'estimated_duration' => $task[$provider->task_estimated_duration_key],
                        'value' => $task[$provider->task_value_key],
                        'provider_id' => $provider->id,
                    ]);
                }
            }

            return 1;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

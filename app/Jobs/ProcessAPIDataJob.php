<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Products;
use Exception;
class ProcessAPIDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        //
        $this->data = $data;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $log = json_encode($this->data) . "\n";
            file_put_contents(storage_path('data.log'), $log, FILE_APPEND);

            Products::insert($this->data);
        } catch (Exception $exception) {
            // Log the exception
            file_put_contents(storage_path('error.log'),$exception->getMessage(), FILE_APPEND);
        }
    }

    public function failed(\Exception $exception = null)
    {
        // Handle the failure, log the error, or perform any other necessary actions
        if ($exception !== null) {
            file_put_contents(storage_path('error.log'),$exception->getMessage(), FILE_APPEND);
        }
    }
}

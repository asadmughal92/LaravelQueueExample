<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Products;
class ProcessAPIDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $prodcut;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data,Products $prodcut )
    {
        //
        $this->data = $data;
        $this->prodcut = $prodcut;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Simulating the data processing (e.g., log data to a file)

        //storing in a log file and also in database
        $log = json_encode($this->data) . "\n";
        file_put_contents(storage_path('data.log'), $log, FILE_APPEND);

        $this->prodcut::insert($this->data);
    }

    public function failed(\Exception $exception = null)
    {
        // Handle failed jobs (e.g., send notifications)
        // For demonstration purposes, you can log the exception

        file_put_contents(storage_path('error.log'), $exception->getMessage(), FILE_APPEND);
    }
}

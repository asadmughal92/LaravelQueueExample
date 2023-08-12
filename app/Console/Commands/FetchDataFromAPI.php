<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
class FetchDataFromAPI extends Command
{
    protected $signature = 'fetch:apidata';
    protected $description = 'Fetches data from an external API and stores it in the database table';


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
            $response = Http::withHeaders([
                'Accept-Language' => 'en', // Set the desired language code here
            ])->get('https://jsonplaceholder.typicode.com/posts');

            $response->throw(); // Throw an exception if the response is not successful

            $data = $response->json();

            foreach ($data as $item) {
                Post::create([
                    'title' => $item['title'],
                    'body' => $item['body'],
                ]);
            }

            $this->info('Data fetched and stored successfully.');
        } catch (\Throwable $e) {
            $this->error('An error occurred while fetching or processing data: ' . $e->getMessage());
        }
    }
}

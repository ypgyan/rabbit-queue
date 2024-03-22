<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class HandlerMQJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $basePath = 'App\\Actions\\Queues\\';

    /**
     * Execute the job.
     */
    public function handle(array $payload): void
    {
        $data = $payload['data'];
        app($this->basePath . $data['action'])->execute($data['payload']);
    }
}

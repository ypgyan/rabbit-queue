<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;
use VladimirYuldashev\LaravelQueueRabbitMQ\Queue\Jobs\RabbitMQJob as BaseJob;

class RabbitMqJob extends BaseJob
{
    public function fire(): void
    {
        $payload = $this->payload();

        $class = HandlerMQJob::class;
        $method = 'handle';
        Log::info('RabbitMqJob', $payload);

        ($this->instance = $this->resolve($class))->{$method}($payload);
        $this->delete();
    }

    public function payload()
    {
        return [
            'job'  => HandlerMQJob::class,
            'data' => json_decode($this->getRawBody(), true)
        ];
    }
}

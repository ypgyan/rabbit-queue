<?php

namespace App\Actions\Queues;

use Illuminate\Support\Facades\Log;

class TestHandler
{
    public function execute(array $data = []): void
    {
        Log::info('TestHandler', $data);
    }
}

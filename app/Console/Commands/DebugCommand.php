<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DebugCommand extends Command
{
    protected $signature = 'debug';
    protected $description = 'This command is used to test stuff wrapped by the Laravel application';

    public function handle(): int
    {
        $this->info('Hello, there.');
        $this->newLine();

        return self::SUCCESS;
    }
}

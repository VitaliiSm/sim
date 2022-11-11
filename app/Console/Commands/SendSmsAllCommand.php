<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Services\SmsService;
use Illuminate\Console\Command;

class SendSmsAllCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(private SmsService $service)
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
        $this->service->processAccounts();
        return Command::SUCCESS;
    }


}

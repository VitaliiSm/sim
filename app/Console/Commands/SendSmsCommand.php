<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Services\SmsService;
use Illuminate\Console\Command;

class SendSmsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:sms';

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
        $email = $this->anticipate('What is your email?', Account::get()->pluck('email'));
        $account = Account::where('email', $email)->with('activeSimCards')->first();
        $this->service->processAccount($account);

        return Command::SUCCESS;
    }


}

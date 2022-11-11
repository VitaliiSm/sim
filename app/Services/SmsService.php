<?php

namespace App\Services;

use App\Models\Account;
use App\Models\SimCard;
use App\Notifications\SmsNotification;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class SmsService
{

    public function processAccount($account)
    {
        if($account->activeSimCards->isNotEmpty()) {
            foreach ($account->activeSimCards as $simCard) {
                try {
                    $this->send($simCard);
                } catch (Exception $exception){
                    Log::error('Error for SimCard with id '
                        . $simCard->id. 'Error: ' .$exception->getMessage());
                }
            }
        }
    }

    public function processAccounts()
    {
        $accounts = $this->getAccounts();

        foreach ($accounts as $account) {
           $this->processAccount($account);
        }
    }

    private  function getAccounts(): ?Collection
    {
        return Account::with('activeSimCards')->get();
    }

    private  function send(SimCard $simCard)
    {
        Log::info('Sending to SimCard with id: '. $simCard->id);
        return $simCard->account->notify(new SmsNotification($simCard));
    }

}

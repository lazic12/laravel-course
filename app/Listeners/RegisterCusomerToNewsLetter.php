<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterCusomerToNewsLetter
{

    public function handle(NewCustomerHasRegisteredEvent $event)
    {
//        dd('Register to Newsletter');
    }
}

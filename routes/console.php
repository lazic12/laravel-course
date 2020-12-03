<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Models\Company;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


//Добавил команду по удалению компании без кастомеров
Artisan::command('contact:company-clean', function(){
    $this->info('Cleaning');
    \App\Models\Models\Company::whereDoesntHave('customers')
        ->get()
        ->each(function ($company){
            $company->delete();
            $this->warn('Deleted '. $company->name);
        })
    ;
})->purpose('Cleans Up Unused Companies');;

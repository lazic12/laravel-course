<?php

namespace App\Console\Commands;

use App\Models\Models\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
//    protected $signature = 'contact:company, {name}, {phone?}';

    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new company';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $company = Company::create([
//            'name'=>'Test Company',
//            'phone'=>'123-123-1234'
//        ]);

//                $company = Company::create([
//            'name'=>$this->argument('name'),
//            'phone'=>$this->argument('phone') ?? 'N/A',
//        ]);
//
//        $this->info('Added: '.$company->name);

        $name = $this->ask('What is the company name');
        $phone= $this->ask('What is your company\'s phone number?');

        if($this->confirm('Are you ready to insert'. $name .'?')){
            $company = Company::create([
            'name'=>$name,
            'phone'=>$phone,
        ]);
            return $this->info('Added '. $company->name);
        }
        $this->warn('No new company created');

//        $this->info($name);

    }
}

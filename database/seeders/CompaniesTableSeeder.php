<?php

namespace Database\Seeders;

use App\Models\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()->count(2)->create();
    }
}

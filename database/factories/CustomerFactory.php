<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Models\Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
//            'company_id'=>self::factoryForModel('Company')->create(),
            'company_id'=>function() { return \App\Models\Models\Company::all()->random();},
            'email'=>$this->faker->companyEmail,
            'phone'=>$this->faker->phoneNumber,
            'active'=>1,
        ];
    }
}

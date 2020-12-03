<?php

namespace Tests\Feature;

use App\Models\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Throwable;

class CustomerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
  public function test_only_logged_in_users_can_see_the_customers_list(){

      $response=$this->get('/customers')->assertRedirect('/login');
  }

  public function test_authenticated_users_can_see_the_customers_list(){
      $this->actingAs(User::factory()->create());
      $response=$this->get('/customers')
          ->assertOk();
  }

  public function test_a_customer_can_be_added(){

      Event::fake();
      $this->withoutExceptionHandling();

      $this->actingAs(User::factory()->create(['email'=>'admin@admin.com']));
      $response=$this->post('/customers', [
          'name'=>'User 123',
          'email'=>'test@test1.com',
          'phone'=>'123123123',
          'active'=>'1',
          'company_id'=>'1'
      ]);

      $this->assertCount(1, Customer::all());
  }
}

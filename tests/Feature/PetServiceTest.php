<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PetServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_dashboard_route_returns_ok_and_contains_expected_pet_data()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertViewHas('pets', function(array $pets) {
            return in_array('Milo', $pets);
        });
    }
}

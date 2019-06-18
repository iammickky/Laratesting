<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Hospital;
class HospitalApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    

        public function testGetHospital() {
            // Arrange 
            $numberOfHospital = 500;
            $hospital = factory(Hospital::class, 10)->create();

            // Act 
            $response = $this->json('GET', '/api/hospitals');
            // Assert 
          $response-> assertStatus(200);
          $response-> assertJsonCount(10);
        }
        

}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Fizzbuzz;

class FizzBuzzTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $fizzBuzz = new Fizzbuzz;
        $output = $fizzBuzz->processNumber(1);
        $this->assertEquals("1", $output );
    } 
}




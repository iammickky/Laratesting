<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Hospital;
use App\Exceptions\ValidationException;

class HospitalModelTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateModel()
    {
        //Arrange
        $name = 'Mick Hospital Nectec';
        $address = '112 moo9 klongluang Patumthani';
        $numberOfBeds = 5000;
        $numberOfDoctors = 333;

        //Act
        $hospital = Hospital::create($name,$address,$numberOfBeds,$numberOfDoctors);

        //Assert
        $this->assertEquals($name, $hospital->name, 'Set hospital name');
        $this->assertEquals($address, $hospital->address, 'Set Address');
        $this->assertEquals($numberOfBeds, $hospital->numberOfBeds, 'Set numberOfBeds');
        $this->assertEquals($numberOfDoctors, $hospital->numberOfDoctors, 'Set numberOfDoctors');
    }
    public function testEmptyNameThrows(){
        //Arrange
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('Invalid name');
        //Act
        $hospital = Hospital::create('', 'Phitsanulok', 100, 10);  

    }
    public function testEmptyNameThrows2(){
        //Arrange
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessageRegExp('/name/');
        //Act
        $hospital = Hospital::create('', 'Phitsanulok', 100, 10);  

    }
    public function testSaveModel()
    {
        //Arrange
        $name = 'Mick Hospital Nectec';
        $address = '112 moo9 klongluang Patumthani';
        $numberOfBeds = 5000;
        $numberOfDoctors = 333;
        $hospital = Hospital::create($name,$address,$numberOfBeds,$numberOfDoctors);

        //Act
        $hospital->save();
        
        //Assert
        $this->assertDatabaseHas('hospitals', [
            'name' => $name,
            'address' => $address,
            'numberOfBeds' => $numberOfBeds,
            'numberOfDoctors' => $numberOfDoctors]);
        }
        
        public function testUpdateModel()
        {
            //Arrange
            $name = 'Mick Hospital Nectec xxx';
            $address = '112 moo9 klongluang Patumthani';
            $numberOfBeds = 5000;
            $numberOfDoctors = 333;
            $hospital = Hospital::create($name,$address,$numberOfBeds,$numberOfDoctors);
            $hospital->save();

            //Act
            $hospital->name ='Nu Hospital';
            $hospital->save();
            
            //Assert
            $this->assertDatabaseHas('hospitals', ['name' => 'Nu Hospital']);
            $this->assertDatabaseMissing('hospitals', ['name' => $name]);
            }

    
            protected function setUp(): void
            {
                parent::setUp();
                for($i = 0; $i < 10; $i++){
                    $name = 'Mick Hospital Nectec';
                    $address = '112 moo9 klongluang Patumthani';
                    $numberOfBeds = 5000;
                    $numberOfDoctors = 333;
                    $hospital = Hospital::create($name,$address,$numberOfBeds,$numberOfDoctors);
                    $hospital->save();

                }
            

            
        }

}




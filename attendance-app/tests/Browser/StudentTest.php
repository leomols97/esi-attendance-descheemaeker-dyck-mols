<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Database\Seeders\DatabaseSeeder;

class StudentTest extends DuskTestCase
{

    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testListStudent()
    {
        DatabaseSeeder::run();

        $this->browse(function (Browser $browser) {
            $browser->visit('/')   
                    ->assertSeeIn('@id_student', '52006')
                    ->assertSeeIn('@id_student', '53212');


        });
    }

    public function testAddStudentSuccess()
    {
        DatabaseSeeder::run();
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Add a Student')
                    ->type('id', '52041')
                    ->type('last_name', 'Aupaix')
                    ->type('first_name', 'Clément')
                    ->press('Add')
                    ->assertPathIs('/student/add')
                    ->visit('/')
                    ->assertSeeIn('@id_student', '52041');
        
        });
    }

    public function testDeleteStudentSuccess()
    {
        DatabaseSeeder::run();
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Delete a Student')
                    ->type('id', '52006')
                    ->press('delete')
                    ->assertPathIs('/student/delete')
                    ->visit('/')
                    ->assertNotSeeIn('@id_student', '52006');
        });
    }
}



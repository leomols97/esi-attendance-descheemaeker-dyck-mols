<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class StudentTest extends DuskTestCase
{

    //use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testListStudent()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')   
                    ->assertSeeIn('@id_student', '52006');
        });
    }

    public function testAddStudentSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Add a Student')
                    ->type('id', '52041')
                    ->type('last_name', 'Aupaix')
                    ->type('first_name', 'Clément')
                    ->press('Add')
                    ->assertPathIs('/student/add');
        
        });
    }

    public function testDeleteStudentSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Delete a Student')
                    ->type('id', '52006')
                    ->press('delete')
                    ->assertPathIs('/student/delete');
        });
    }
}



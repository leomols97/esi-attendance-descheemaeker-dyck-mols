<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\StudentModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\DatabaseSeeder;



class StudentModelTest extends TestCase
{
    use RefreshDatabase;
    


    /**
     * Counting the numbre of students in the data base
     *
     * @return void
     */
    public function test_consultation()
    {
        DatabaseSeeder::run();
        $count = count(StudentModel::findAll());
        $this->assertEquals(2, $count);
        /*$user1 = User::factory()->create([
            'last_name' => 'Dyck',
            'first_name' => 'Olivier',
        ]);*/


    }

    /**
     * http response test
     * @return void 
     */
    public function test_consultation_httpResponse()
    {
        $response = $this->get("/");
        $response->assertStatus(200);
    }

    /**
     * Trying to add a simple student
     *
     * @return void
     */
    public function test_add_student()
    {
        // Make call to application...
        StudentModel::addStudent(1, 'Squarepants', 'Bob');

        $this->assertDatabaseHas('Students', [
            'id' => 1,
            'last_name' => 'Squarepants',
            'first_name' => 'Bob'
        ]);
    }

    /**
     * http test
     * @return void
     */
    public function test_add_student_httpResponse(){
        $response = $this->post('/student/add');

        $response->assertStatus(200);
    }

    /**
     * Trying to add an existing id student
     *
     * @return void
     */
    public function test_add_existing_student()
    {
        
        DatabaseSeeder::run();
        StudentModel::addStudent(52006, 'Dyck', 'Olivier');
        $count = count(StudentModel::findAll());
        $this->assertEquals(2, $count);

    }

    /**
     * Trying to add an id lower than 0
     *
     * @return void
     */
    public function test_add_student_invalid_id()
    {
        DatabaseSeeder::run();
        StudentModel::addStudent(-1, 'Squarepants', 'Bob');
        $count = count(StudentModel::findAll());
        $this->assertEquals(2, $count);

    }

    /**
     * Trying to delete an unexisting id
     *
     * @return void
     */
    public function test_delete_student_invalid_id()
    {
        DatabaseSeeder::run();
        StudentModel::deleteStudent(2);
        $count = count(StudentModel::findAll());
        $this->assertEquals(2, $count);
       
    }

    /**
     * Trying to delete an unexisting id
     *
     * @return void
     */
    public function test_delete_student()
    {
        StudentModel::addStudent(1, "SquarePants", "Bob");
        StudentModel::deleteStudent(1);
        $this->assertDatabaseMissing('students', ['id' => '1']);
    }

    /**
     * http response test
     * @return void 
     */
    public function test_delete_student_httpResponse()
    {
        $response = $this->post("/student/delete");
        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Unit;

//use Tests\TestCase;
use App\Models\StudentModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PDOException;
use SQLException;
use PHPUnit\Framework\TestCase;
use Database\seeders\DatabaseSeeder;

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
        $this->assertEquals(7, $count);
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

        $response->assertStatus(201);
    }

    /**
     * Trying to add an existing id student
     *
     * @return void
     */
    public function test_add_existing_student()
    {
        $this->expectException(PDOException::class);
        // or for PHPUnit < 5.2
        // $this->setExpectedException(InvalidArgumentException::class);

        //...and then add your test code that generates the exception
        StudentModel::addStudent(52006, 'Dyck', 'Olivier');
    }

    /**
     * Trying to add an id lower than 0
     *
     * @return void
     */
    public function test_add_student_invalid_id()
    {
        $this->expectException(PDOException::class);
        // or for PHPUnit < 5.2
        // $this->setExpectedException(InvalidArgumentException::class);

        //...and then add your test code that generates the exception
        StudentModel::addStudent(-1, 'Squarepants', 'Bob');
    }

    /**
     * Trying to delete an unexisting id
     *
     * @return void
     */
    public function test_delete_student_invalid_id()
    {
        $this->expectException(PDOException::class);
        // or for PHPUnit < 5.2
        // $this->setExpectedException(InvalidArgumentException::class);

        //...and then add your test code that generates the exception
        StudentModel::deleteStudent(2);
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
        $reponse->assertStatus(204);
    }
}

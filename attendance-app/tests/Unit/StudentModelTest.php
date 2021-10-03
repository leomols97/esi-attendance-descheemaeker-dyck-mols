<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\StudentModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PDOException;
use SQLException;

class StudentModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_basic_test()
    {
        $data = [10, 20, 30];
        $result = array_sum($data);
        $this->assertEquals(60, $result);
    }

    /**
     * Counting the numbre of students in the data base
     *
     * @return void
     */
    public function test_consultation()
    {
        $count = count(StudentModel::findAll());
        $this->assertEquals(7, $count);
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
        StudentModel::addStudent(1, 'Squarepants', 'Bob');
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
}

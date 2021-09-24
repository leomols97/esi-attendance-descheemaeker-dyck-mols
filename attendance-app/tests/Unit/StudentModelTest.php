<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\StudentModel;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function PHPUnit\Framework\assertEquals;

class StudentModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_consultation()
    {
        $count = count(StudentModel::findAll());
        assertEquals(11, $count);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_select_student()
    {
        $student = StudentModel::selectStudent(1);
        echo $student;
        $id = $student[0];
        $last_name = $student[1];
        $first_name = $student[2];
        $attr = "" . $id . " " . $last_name . " " . $first_name;
        $student = "1 Squarepants Bob";
        assertEquals($student, $attr);

        $student = StudentModel::factory()->make(
            [
                ''
            ]
        );
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_adding()
    {
        StudentModel::addStudent(1, 'Squarepants', 'Bob');
        $student = StudentModel::selectStudent(1);
        assertEquals($student, StudentModel::selectStudent(1));
    }
}

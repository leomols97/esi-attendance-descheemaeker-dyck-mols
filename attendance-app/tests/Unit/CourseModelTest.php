<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\CourseModel;
use function PHPUnit\Framework\assertEquals;

class CourseModelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_select_courses()
    {
        $count = count(CourseModel::findAll());
        assertEquals(1, $count);
    }
}

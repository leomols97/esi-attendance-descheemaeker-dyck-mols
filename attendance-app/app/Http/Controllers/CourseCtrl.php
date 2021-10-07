<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseModel;

class CourseCtrl extends Controller
{
    public function home()
    {
        // 2021_10_07
        $courses = CourseModel::findAll();
        $courses_json = json_encode($courses);
        return view("course", ["courses" => $courses_json]);
    }
}

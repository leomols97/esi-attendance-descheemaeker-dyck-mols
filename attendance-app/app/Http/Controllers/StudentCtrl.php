<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;

class StudentCtrl extends Controller
{
    public function home()
    {
        $students = StudentModel::findAll();
        return view("student", ["students" => $students]);
    }
}

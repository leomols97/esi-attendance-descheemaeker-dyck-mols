<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;

class StudentCtrl extends Controller
{
    public function home()
    {
        $students = StudentModel::findAll();
        $students_json = json_encode($students);
        return view("student", ["students" => $students_json]);
    }

    public function addStudent()
    {
        $array=[];
        if(isset($_REQUEST["id"])
            && isset($_REQUEST["last_name"])
            && isset($_REQUEST["first_name"]))
        {
            $id = $_REQUEST["id"];
            $last_name = $_REQUEST["last_name"];
            $first_name = $_REQUEST["first_name"];
            $inserted = StudentModel::addStudent($id, $last_name, $first_name);
            $array = ["inserted" => $inserted];
        }
        else
        {
            $inserted = false;
            $array = ["inserted" => $inserted];
        }
        $students = StudentModel::findAll();
        $students_json = json_encode($students);
        return view("student", ["students" => $students_json]);
    }

    public function deleteStudent()
    {
        $array=[];
        if(isset($_REQUEST["id"]))
        {
            if (StudentModel::selectStudent($_REQUEST["id"]) != nullOrEmptyString())
            {
                $id = $_REQUEST["id"];
                $deleted = StudentModel::deleteStudent($id);
                $array = ["deleted" => $deleted];
            }
            else
            {
                $deleted = false;
                $array = ["deleted" => $deleted];
            }
        }
        else
        {
            $deleted = false;
            $array = ["deleted" => $deleted];
        }
        $students = StudentModel::findAll();
        $students_json = json_encode($students);
        return view("student", ["students" => $students_json]);
    }
}

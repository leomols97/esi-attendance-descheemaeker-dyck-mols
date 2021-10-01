<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use FFI\Exception as FFIException;

class StudentCtrl extends Controller
{
    public function home()
    {
        $students = StudentModel::findAll();
        $students_json = json_encode($students);
        return view("student", ["students" => $students_json]);
    }

    static function selectStudent($id)
    {
            return StudentModel::selectStudent($id);
    }

    static function existingStudent($id)
    {
        return $id == StudentCtrl::selectStudent($id);
    }

    public function addStudent()
    {
        $array=[];
        if(isset($_REQUEST["id"])
            && isset($_REQUEST["last_name"])
            && isset($_REQUEST["first_name"])
            && !StudentCtrl::existingStudent($_REQUEST["id"]))
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
        if(isset($_REQUEST["id2"]))
        {
            $id = $_REQUEST["id"];
            $deleted = StudentModel::deleteStudent($id);
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

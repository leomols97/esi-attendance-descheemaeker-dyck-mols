<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentModel extends Model
{
    use HasFactory;

    static public function findAll()
    {
        $students = DB::select('
        SELECT id, last_name, first_name
        FROM Students
        ORDER BY id ASC
        ');
        return $students;
    }

    static public function addStudent($id, $last_name, $first_name)
    {
        DB::insert('insert into Students (id, last_name, first_name) values (?, ?, ?)', [$id, $last_name, $first_name]);
    }

    static public function selectStudent($id)
    {
        $student = DB::select('select * from Students where id = ?', [$id]);
        return $student;
    }
}
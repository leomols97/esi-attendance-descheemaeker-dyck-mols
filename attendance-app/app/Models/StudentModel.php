<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

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
        try {
            DB::insert('
                INSERT INTO Students (id, last_name, first_name) values (?, ?, ?)
                ', [$id, $last_name, $first_name]
            );
        } catch (QueryException $th) {
            echo "Student existant";
        }
    }

    static public function selectStudent($id)
    {
        $student = DB::select('select * from Students where id = ?', [$id]);
        return $student;
    }

    static public function deleteStudent($id)
    {
        DB::delete('DELETE FROM Students WHERE id=?', [$id]);
    }
}

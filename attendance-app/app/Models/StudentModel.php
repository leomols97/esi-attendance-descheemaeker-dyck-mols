<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentModel extends Model
{
    use HasFactory;

    static public function findAll() {
        $students = DB::select( '
        SELECT id, last_name, first_name
        FROM Students
        ORDER BY desc(id)
        ');
        $students_json = json_encode($students);
        return $students_json;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CourseModel extends Model
{
    use HasFactory;

    static public function findAll()
    {
        $courses = DB::select('
            SELECT cours, date, heure
            FROM courses
            ORDER BY date ASC
        ');
        return $courses;
    }
}

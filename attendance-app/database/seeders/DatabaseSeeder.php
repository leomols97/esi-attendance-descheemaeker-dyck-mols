<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Integer;
use Ramsey\Uuid\Type\Integer as TypeInteger;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<7; $i++){
            DB::table('students')->insert([
                'id' => random_int(10000, 99999),
                'last_name' => Str::random(20),
                'first_name' => Str::random(20),
            ]);
        }
    }
}

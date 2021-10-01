<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\DateFactory;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Integer;
use Ramsey\Uuid\Type\Integer as TypeInteger;
use Ramsey\Uuid\Type\Time;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('students')->insert([
            'id' => random_int(10000, 99999),
            'last_name' => Str::random(20),
            'first_name' => Str::random(20),
        ]);

        DB::table('courses')->insert([
            'course' => strtoupper(Str::random(5)),
            'date' => date(\Carbon\Carbon::createFromDate(rand(2000, 2022), rand(0, 12), rand(0, 28))->toDateString()),
            'hour' => \Carbon\Carbon::createFromTime(rand(0,24), rand(0, 60), rand(0, 60))->toTimeString(),
        ]);
        for($i=1; $i<7; $i++){
            DB::table('students')->insert([
                'id' => random_int(10000, 99999),
                'last_name' => Str::random(20),
                'first_name' => Str::random(20),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Learninghour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class LearninghourSeeder extends Seeder
{

    public function run(): void
    {
        $file_path = public_path()."/seeds/learninghours.json";
        $raw_data = File::get($file_path);
        $hours = json_decode($raw_data,true);
        foreach($hours as $grade => $programs)
        {
            foreach($programs as $programname => $campuses)
            {
                foreach($campuses as $campusname => $subjects)
                {
                    foreach ($subjects as $subjectcategory => $subjectnames)
                    {
                        foreach ($subjectnames as $name => $hour)
                        {
                            Learninghour::create([
                                "grade" => $grade,
                                "program" => $programname,
                                "campus" => $campusname,
                                "subjectcategory" => $subjectcategory,
                                "subjectname" => $name,
                                "hour" => $hour
                            ]);
                        }
                    }
                }
            }
        }
    }
}

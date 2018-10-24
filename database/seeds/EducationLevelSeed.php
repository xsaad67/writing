<?php

use Illuminate\Database\Seeder;

class EducationLevelSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $education_level=[
                        ['name'=>'PHD','category'=>'a40'],
                        ['name'=>'Masters/PostGraduate','category'=>'a40'],
                        ['name'=>'Bachelors/UnderGraduate','category'=>'a40'],
                        ['name'=>'College','category'=>'b40'],
                        ['name'=>'HighSchool','category'=>'b40'],
                    ];


        foreach($education_level as $k=>$education_levels){
            \DB::table('educationlevels')->insert([
                'name' => $education_levels['name'],
                'category' => $education_levels['category'],
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ]);
        }

    }
}

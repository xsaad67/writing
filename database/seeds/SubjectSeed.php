<?php

use Illuminate\Database\Seeder;

class SubjectSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subjects = array('Marketing','Strategic Management','HRM','Organizational Behaviour','Supply Chain Management','Economics','Finance','Account','Statistics','Criminology','Psychology','Sociology','IT','Others');

        foreach($subjects as $subject){
            \DB::table('subjects')->insert([
                'name' => $subject,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ]);
        }
       
    }
}

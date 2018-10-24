<?php

use Illuminate\Database\Seeder;

class StyleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $styles=array('APA','Harvard','Chicago','MLA');

         foreach($styles as $style){
            \DB::table('styles')->insert([
                'name' => $style,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ]);
         }
       

    }
}

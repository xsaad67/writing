<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaperTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seed PaperType
         $paper_type=[
                        ['name'=>'Proposal','category'=>'a40'],
                        ['name'=>'Dissertation','category'=>'a40'],
                        ['name'=>'Business Plan','category'=>'a40'],
                        ['name'=>'Assignment','category'=>'b40'],
                        ['name'=>'Essay','category'=>'b40'],
                        ['name'=>'Book/Article/Video/Book Review','category'=>'b40'],
                        ['name'=>'PPT','category'=>'b40'],
                    ];


        foreach($paper_type as $k=>$paper){
            DB::table('papertypes')->insert([
                'name' => $paper['name'],
                'category' => $paper['category'],
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ]);
        }

    }
}

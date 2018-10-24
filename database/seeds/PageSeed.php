<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $ran = array('home_vpn_takeatour3.png','home_vpn_takeatour2.png','home_vpn_takeatour1.png');
        $i=1;
    	foreach (range(1,20) as $index) {
	        DB::table('pages')->insert([
          	'title' => $faker->name,
            'slug' => 'title'.$i,
            'meta_title' => $faker->title,
            'meta_description' => $faker->title,
            'meta_keywords' => $faker->title,
            'description' => $faker->randomHtml(6,10),
            'image'=> $ran[array_rand($ran, 1)],
            'created_at' => date('Y-m-d h:i:s'),
	     ]);
            ++$i;
    }
}

}
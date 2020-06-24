<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<10; $i++){
            DB::table('products')->insert([
                "title"=>$faker->name,
                "category_id"=>$faker->numberBetween(1,2),
                "image"=>"images/demo.png",
                "old_price"=>$faker->numberBetween(200000,400000),
                "new_price"=>$faker->numberBetween(200000,400000),
                "description"=>$faker->name,

            ]);
            }
    }
}

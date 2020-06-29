<?php

use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
            "code"=>"ABC1", "value"=>45]);
            DB::table('promotions')->insert([
                "code"=>"ABC2", "value"=>50]);
    }
}

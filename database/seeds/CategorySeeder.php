<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            "name"=>"Lolita"]);
        DB::table('categories')->insert([
            "name"=>"Hanfu"]);
        DB::table('categories')->insert([
             "name"=>"Ao dai"]);
       DB::table('categories')->insert([
             "name"=>"Cosplay"]);
         DB::table('categories')->insert([
             "name"=>"Accessories"]);
    }
}
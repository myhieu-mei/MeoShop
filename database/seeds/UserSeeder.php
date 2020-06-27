<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name"=>"user",
            "username"=>"user",
            "password"=>Hash::make('user'),
            "birthday"=>"1/1/1",
            "numphone"=>"5258965",
            "role"=>"user"]);

            DB::table('users')->insert([
                "name"=>" Admin",
                "username"=>"admin",
                "password"=>Hash::make('admin'),
                "birthday"=>"1/1/1",
                "numphone"=>"025694265",
                "role"=>"admin"]);
    }
}

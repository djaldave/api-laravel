<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table("categories")->insert(
        	array(
        		array(
        			"id" => "main-dish",
        			"name" => "Main Dish"
        		),
        		array(
        			"id" => "appetizer",
        			"name" => "appetizer"
        		)
        	)
        );
    }
}

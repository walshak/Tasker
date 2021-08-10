<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// Import DB and Faker services
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

    	foreach (range(0,20) as $index) {
            DB::table('tasks')->insert([
                'name' => $faker->sentence(),
                'desc' => $faker->paragraph(),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        //$this->call([UsersTableSeeder::class]);
        //$this->call(StudentsTableSeeder::class);

        $faker = Faker::create();
    	// foreach (range(1,100) as $index) {
        //     DB::table('students')->insert([
        //         'first_name' => $faker->firstname,                
        //         'middle_name' => $faker->lastname,
        //         'last_name' => $faker->lastname
        //     ]);
        // }

        foreach (range(1,50) as $index) {
            DB::table('incoming_students')->insert([
                'first_name' => $faker->firstname,                
                'middle_name' => $faker->lastname,
                'last_name' => $faker->lastname,
                'fathers_name' => $faker->name,
                'mothers_name' => $faker->name,
                'guardian' => $faker->name,
            ]);
        }

        // foreach (range(1,50) as $index) {
        //     DB::table('people')->insert([
        //         'first_name' => $faker->firstname,                
        //         'middle_name' => $faker->lastname,
        //         'last_name' => $faker->lastname,
        //     ]);
        // }
    }
}

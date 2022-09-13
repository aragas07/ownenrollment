<?php

namespace Database\Seeders;

use Database\Factories\StudentFactory;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StudentFactory::class, 100)->create();
    }
}

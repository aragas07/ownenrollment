<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Dony Dongiapon',
            'email' => 'dony.dongiapon@dorsu.edu.ph',
            'email_verified_at' => now(),
            'password' => Hash::make('itsu#34D'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

<?php

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
        App\User::create([
		    'name' => 'Michela',
		    'email' => 'michela.franchini@outlook.it',
		    'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
		    'is_permission' => 1
	    ]);
        // $this->call(UserSeeder::class);
    }
}

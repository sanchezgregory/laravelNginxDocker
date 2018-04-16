<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Gregory Sanchez',
            'email' => 'mcgregox@gmail.com',
            'password' => bcrypt('123456'),
            'role_id' => '1'
        ]);

        factory(User::class, 9)->create();
    }
}

<?php

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
        App\user::create([
            'name'=>'maruf rahman',
            'email'=>'vjratul@hotmail.com',
            'password'=>bcrypt('password')
        ]);
    }
}

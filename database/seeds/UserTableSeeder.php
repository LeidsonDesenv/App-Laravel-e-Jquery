<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create( [
            "name" => "Leidson",
            "email" => "leidsonlag@hotmail.com",
            "password" => bcrypt('010203')
        ]);
        factory(App\Post::class, 10)->create();
    }
}

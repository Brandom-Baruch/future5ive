<?php

use Illuminate\Database\Seeder;
use App\User;
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

            'name'=>'Eduardo Reyes',
            'email'=>'musemex27@gmail.com',
            'password'=>bcrypt('123123'),
            'admin'=>true
        ]);

         User::create([

            'name'=>'Brandom Baruch',
            'email'=>'baruchoo94@gmail.com',
            'password'=>bcrypt('123123'),
            'admin'=>true
        ]);

        User::create([

            'name'=>'Fernando',
            'email'=>'backfiregreen55@gmail.com',
            'password'=>bcrypt('123123'),
            'admin'=>false
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
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
            'password'=>bcrypt('123123')
            //'admin'=>true
        ]);

         Admin::create([

            'name'=>'Brandom Baruch',
            'email'=>'baruchoo94@gmail.com',
            'password'=>bcrypt('123123'),  
            'phone'=>'2481415272'          
        ]);

        User::create([

            'name'=>'Fernando',
            'email'=>'backfiregreen55@gmail.com',
            'password'=>bcrypt('123123')            
        ]);
    }
}

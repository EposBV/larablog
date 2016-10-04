<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
   
    public function run()
    {
      //  DB::table('users')->delete();
        
        $items = array
        (
            array(
                'name' => 'Piet',
                'password' => Hash::make('piet'),
                'email' => 'piet@test.nl'
            ),
            array(
                'name' => 'Henk',
                'password' => Hash::make('henk'),
                'email' => 'henk@test.nl'
            )
        );
        
     //   DB::table('users')->insert($items);
        
    }
}


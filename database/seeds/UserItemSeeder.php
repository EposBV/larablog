<?php

use Illuminate\Database\Seeder;

class UserItemSeeder extends Seeder
{
   
    public function run()
    {
        DB::table('items')->delete();
        
        $items = array
        (
            array(
                'owner_id' => 7,
                'task' => 'Naar de wc',
                'done' => true
            ),
            array(
                'owner_id' => 7,
                'task' => 'Koffie drinken',
                'done' => false
            ),
            array(
                'owner_id' => 7,
                'task' => 'Afwas doen',
                'done' => false
            ),
            array(
                'owner_id' => 7,
                'task' => 'Hond uitlaten',
                'done' => true
            ),
            array(
                'owner_id' => 7,
                'task' => 'Koe melken',
                'done' => false
            ),
            array(
                'owner_id' => 7,
                'task' => 'Paard rossen',
                'done' => false
            )            
        );
        
        DB::table('items')->insert($items);
        
    }
}


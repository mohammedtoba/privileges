<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'root',
                'description' => NULL,
                'created_at' => '2017-01-05 22:01:22',
                'updated_at' => '2018-01-05 22:01:32',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'HOD',
                'description' => NULL,
                'created_at' => '2018-01-05 22:01:28',
                'updated_at' => '2018-01-05 22:01:31',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'medical',
                'description' => NULL,
                'created_at' => '2018-01-05 22:01:24',
                'updated_at' => '2018-01-05 22:01:32',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'viewer',
                'description' => NULL,
                'created_at' => '2018-01-05 22:01:29',
                'updated_at' => '2018-01-05 22:01:30',
            ),
        ));
        
        
    }
}
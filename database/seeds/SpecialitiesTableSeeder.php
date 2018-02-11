<?php

use Illuminate\Database\Seeder;

class SpecialitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('specialities')->delete();
        
        \DB::table('specialities')->insert(array (
            0 => 
            array (
                'specno' => '1',
                'spec_desc' => 'Anasthesiology',
                'spec_desc_ar' => NULL,
                'spec_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'specno' => '2',
                'spec_desc' => 'Cardiology',
                'spec_desc_ar' => NULL,
                'spec_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'specno' => '3',
                'spec_desc' => 'Medicine',
                'spec_desc_ar' => NULL,
                'spec_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'specno' => '4',
                'spec_desc' => 'Cardiac surgery',
                'spec_desc_ar' => NULL,
                'spec_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'specno' => '5',
                'spec_desc' => 'Intensive care',
                'spec_desc_ar' => NULL,
                'spec_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
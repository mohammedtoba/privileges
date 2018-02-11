<?php

use Illuminate\Database\Seeder;

class DisciplinesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('disciplines')->delete();
        
        \DB::table('disciplines')->insert(array (
            0 => 
            array (
                'dispno' => '1',
                'disp_desc' => 'Physician',
                'disp_desc_ar' => NULL,
                'disp_actv' => NULL,
                'created_at' => '2017-12-20 00:28:44',
                'updated_at' => '2017-12-23 15:21:29',
            ),
            1 => 
            array (
                'dispno' => '2',
                'disp_desc' => 'Dentist',
                'disp_desc_ar' => NULL,
                'disp_actv' => NULL,
                'created_at' => '2017-12-20 00:28:45',
                'updated_at' => '2017-12-23 15:21:32',
            ),
            2 => 
            array (
                'dispno' => '3',
                'disp_desc' => 'Adminstrator',
                'disp_desc_ar' => NULL,
                'disp_actv' => NULL,
                'created_at' => '2017-12-20 00:28:46',
                'updated_at' => '2017-12-23 15:21:35',
            ),
        ));
        
        
    }
}
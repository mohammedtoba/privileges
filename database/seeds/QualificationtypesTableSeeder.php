<?php

use Illuminate\Database\Seeder;

class QualificationtypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('qualificationtypes')->delete();
        
        \DB::table('qualificationtypes')->insert(array (
            0 => 
            array (
                'qual_typ' => '1',
                'qual_typ_desc' => 'Master',
                'qual_typ_desc_ar' => NULL,
                'qual_typ_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'qual_typ' => '2',
                'qual_typ_desc' => 'PHD',
                'qual_typ_desc_ar' => NULL,
                'qual_typ_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'qual_typ' => '3',
                'qual_typ_desc' => 'Diploma',
                'qual_typ_desc_ar' => NULL,
                'qual_typ_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'qual_typ' => '4',
                'qual_typ_desc' => 'Bachelor',
                'qual_typ_desc_ar' => NULL,
                'qual_typ_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
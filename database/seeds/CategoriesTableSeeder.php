<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'catgno' => '1',
                'catg_desc' => 'Resident',
                'catg_desc_ar' => NULL,
                'catg_actv' => NULL,
                'created_at' => '2017-12-20 00:27:42',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'catgno' => '2',
                'catg_desc' => 'Registrar',
                'catg_desc_ar' => NULL,
                'catg_actv' => NULL,
                'created_at' => '2017-12-20 00:27:43',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'catgno' => '3',
                'catg_desc' => 'Senior registrar',
                'catg_desc_ar' => NULL,
                'catg_actv' => NULL,
                'created_at' => '2017-12-20 00:27:44',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'catgno' => '4',
                'catg_desc' => 'Consultant',
                'catg_desc_ar' => NULL,
                'catg_actv' => NULL,
                'created_at' => '2017-12-20 00:27:44',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
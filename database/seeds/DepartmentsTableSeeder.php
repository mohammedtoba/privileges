<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('departments')->delete();
        
        \DB::table('departments')->insert(array (
            0 => 
            array (
                'id' => '9',
                'depno' => NULL,
                'dept_nam' => 'ICU',
                'dept_nam_ar' => NULL,
                'head_userid' => '9',
                'parent_depno' => '2',
                'dept_actv' => 'Y',
                'created_at' => '2017-12-20 00:25:04',
                'updated_at' => '2018-01-02 09:47:23',
            ),
            1 => 
            array (
                'id' => '22',
                'depno' => NULL,
                'dept_nam' => 'ER',
                'dept_nam_ar' => NULL,
                'head_userid' => '14',
                'parent_depno' => '2',
                'dept_actv' => 'Y',
                'created_at' => '2017-12-20 00:25:06',
                'updated_at' => '2018-01-05 13:31:18',
            ),
            2 => 
            array (
                'id' => '3',
                'depno' => NULL,
                'dept_nam' => 'OBGYN',
                'dept_nam_ar' => NULL,
                'head_userid' => '6',
                'parent_depno' => '2',
                'dept_actv' => 'Y',
                'created_at' => '2017-12-20 00:25:07',
                'updated_at' => '2018-01-02 02:33:47',
            ),
            3 => 
            array (
                'id' => '4',
                'depno' => NULL,
                'dept_nam' => 'Ophthalmology',
                'dept_nam_ar' => NULL,
                'head_userid' => '13',
                'parent_depno' => '2',
                'dept_actv' => 'Y',
                'created_at' => '2017-12-20 00:30:38',
                'updated_at' => '2018-01-05 19:20:10',
            ),
            4 => 
            array (
                'id' => '5',
                'depno' => NULL,
                'dept_nam' => 'Cardiology',
                'dept_nam_ar' => NULL,
                'head_userid' => '1',
                'parent_depno' => '2',
                'dept_actv' => 'Y',
                'created_at' => '2017-12-20 00:30:52',
                'updated_at' => '2018-01-05 22:13:13',
            ),
            5 => 
            array (
                'id' => '6',
                'depno' => NULL,
                'dept_nam' => 'Pediatric',
                'dept_nam_ar' => NULL,
                'head_userid' => '8',
                'parent_depno' => '2',
                'dept_actv' => 'Y',
                'created_at' => '2017-12-20 00:31:07',
                'updated_at' => '2018-01-05 19:15:26',
            ),
            6 => 
            array (
                'id' => '2',
                'depno' => NULL,
                'dept_nam' => 'Medical Director',
                'dept_nam_ar' => NULL,
                'head_userid' => '4',
                'parent_depno' => '1',
                'dept_actv' => 'Y',
                'created_at' => '2018-01-02 00:23:41',
                'updated_at' => '2018-01-02 02:25:59',
            ),
            7 => 
            array (
                'id' => '1',
                'depno' => NULL,
                'dept_nam' => 'General Director',
                'dept_nam_ar' => NULL,
                'head_userid' => '9',
                'parent_depno' => NULL,
                'dept_actv' => 'Y',
                'created_at' => '2018-01-02 02:44:14',
                'updated_at' => '2018-01-02 01:31:10',
            ),
            8 => 
            array (
                'id' => '23',
                'depno' => NULL,
                'dept_nam' => 'Cardiac cathlab',
                'dept_nam_ar' => NULL,
                'head_userid' => '12',
                'parent_depno' => '5',
                'dept_actv' => 'Y',
                'created_at' => '2018-01-02 01:55:44',
                'updated_at' => '2018-01-02 01:55:44',
            ),
        ));
        
        
    }
}
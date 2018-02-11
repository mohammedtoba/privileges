<?php

use Illuminate\Database\Seeder;

class QualificationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('qualifications')->delete();
        
        \DB::table('qualifications')->insert(array (
            0 => 
            array (
                'id' => 5,
                'medstaff_id' => 1,
                'qualif_desc' => 'test',
                'qualif_year' => NULL,
                'qualif_country' => NULL,
                'qualif_univ' => NULL,
                'qual_typ' => '1',
                'qualif_file_upload' => NULL,
                'qualif_notes' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 24,
                'medstaff_id' => 5,
                'qualif_desc' => 'Optics',
                'qualif_year' => 2008,
                'qualif_country' => 'Egypt',
                'qualif_univ' => 'Zagazig',
                'qual_typ' => '1',
                'qualif_file_upload' => NULL,
                'qualif_notes' => NULL,
                'created_at' => '2017-12-30 11:35:09',
                'updated_at' => '2018-01-02 16:27:29',
            ),
            2 => 
            array (
                'id' => 29,
                'medstaff_id' => 5,
                'qualif_desc' => 'Optics',
                'qualif_year' => 2015,
                'qualif_country' => 'USA',
                'qualif_univ' => 'Ain Shams',
                'qual_typ' => '4',
                'qualif_file_upload' => 'medicalstaffs/5/6267.jpeg',
                'qualif_notes' => NULL,
                'created_at' => '2017-12-30 11:52:27',
                'updated_at' => '2017-12-30 11:52:27',
            ),
            3 => 
            array (
                'id' => 30,
                'medstaff_id' => 5,
                'qualif_desc' => 'surgery',
                'qualif_year' => 2015,
                'qualif_country' => 'Egypt',
                'qualif_univ' => 'Ain Shams',
                'qual_typ' => '2',
                'qualif_file_upload' => 'medicalstaffs/5/51.jpeg',
                'qualif_notes' => NULL,
                'created_at' => '2017-12-30 14:13:07',
                'updated_at' => '2018-01-02 03:05:37',
            ),
            4 => 
            array (
                'id' => 32,
                'medstaff_id' => 5,
                'qualif_desc' => 'Medicine',
                'qualif_year' => 2005,
                'qualif_country' => 'Canada',
                'qualif_univ' => 'Toronto',
                'qual_typ' => '3',
                'qualif_file_upload' => 'medicalstaffs/5/53.jpeg',
                'qualif_notes' => NULL,
                'created_at' => '2017-12-30 18:13:57',
                'updated_at' => '2017-12-30 18:13:57',
            ),
            5 => 
            array (
                'id' => 34,
                'medstaff_id' => 5,
                'qualif_desc' => 'ophthalmology',
                'qualif_year' => 2017,
                'qualif_country' => 'Saudi Arabia',
                'qualif_univ' => 'Madinah',
                'qual_typ' => '3',
                'qualif_file_upload' => NULL,
                'qualif_notes' => NULL,
                'created_at' => '2017-12-31 19:22:47',
                'updated_at' => '2017-12-31 19:22:47',
            ),
            6 => 
            array (
                'id' => 35,
                'medstaff_id' => 9,
                'qualif_desc' => 'surgery',
                'qualif_year' => 2015,
                'qualif_country' => 'Egypt',
                'qualif_univ' => 'Ain Shams',
                'qual_typ' => '2',
                'qualif_file_upload' => NULL,
                'qualif_notes' => NULL,
                'created_at' => '2018-01-02 00:30:12',
                'updated_at' => '2018-01-02 00:30:12',
            ),
            7 => 
            array (
                'id' => 36,
                'medstaff_id' => 10,
                'qualif_desc' => 'Cardiology',
                'qualif_year' => 2001,
                'qualif_country' => 'USA',
                'qualif_univ' => 'Michegin',
                'qual_typ' => '2',
                'qualif_file_upload' => 'medicalstaffs/10/102.jpeg',
                'qualif_notes' => NULL,
                'created_at' => '2018-01-05 21:08:06',
                'updated_at' => '2018-01-05 21:08:06',
            ),
            8 => 
            array (
                'id' => 37,
                'medstaff_id' => 10,
                'qualif_desc' => 'Medicine',
                'qualif_year' => 1990,
                'qualif_country' => 'Egypt',
                'qualif_univ' => 'Zagazig',
                'qual_typ' => '4',
                'qualif_file_upload' => NULL,
                'qualif_notes' => NULL,
                'created_at' => '2018-01-05 21:11:42',
                'updated_at' => '2018-01-05 21:11:42',
            ),
            9 => 
            array (
                'id' => 38,
                'medstaff_id' => 10,
                'qualif_desc' => 'cardiology',
                'qualif_year' => 1995,
                'qualif_country' => 'Saudi Arabia',
                'qualif_univ' => 'Taibah',
                'qual_typ' => '1',
                'qualif_file_upload' => 'medicalstaffs/10/101.png',
                'qualif_notes' => NULL,
                'created_at' => '2018-01-05 21:21:37',
                'updated_at' => '2018-01-05 21:21:37',
            ),
        ));
        
        
    }
}
<?php

use Illuminate\Database\Seeder;

class NationalitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('nationalities')->delete();
        
        \DB::table('nationalities')->insert(array (
            0 => 
            array (
                'natno' => '151',
                'nat_desc' => 'Argentine',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'natno' => '152',
                'nat_desc' => 'Argentinian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'natno' => '153',
                'nat_desc' => 'Australian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'natno' => '154',
                'nat_desc' => 'Belgian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2012-12-20 00:26:21',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'natno' => '155',
                'nat_desc' => 'Bolivian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:21',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'natno' => '156',
                'nat_desc' => 'Brazilian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:20',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'natno' => '157',
                'nat_desc' => 'Cambodian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:19',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'natno' => '158',
                'nat_desc' => 'Cameroonian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:19',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'natno' => '159',
                'nat_desc' => 'Canadian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:18',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'natno' => '160',
                'nat_desc' => 'Chilean',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:18',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'natno' => '161',
                'nat_desc' => 'Chinese',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:17',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'natno' => '162',
                'nat_desc' => 'Colombian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:16',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'natno' => '163',
                'nat_desc' => 'Costa Rican',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:16',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'natno' => '164',
                'nat_desc' => 'Cuban',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:15',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'natno' => '165',
            'nat_desc' => 'Danish (Dane)',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:14',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'natno' => '166',
                'nat_desc' => 'Dominican',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:13',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'natno' => '167',
                'nat_desc' => 'Ecuadorian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:13',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'natno' => '168',
                'nat_desc' => 'Egyptian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:12',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'natno' => '169',
                'nat_desc' => 'Salvadorian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:12',
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'natno' => '170',
                'nat_desc' => 'English',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:11',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'natno' => '171',
                'nat_desc' => 'Estonian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:11',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'natno' => '172',
                'nat_desc' => 'Ethiopian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:10',
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'natno' => '173',
                'nat_desc' => 'Finnish',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:09',
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'natno' => '174',
                'nat_desc' => 'French',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:09',
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'natno' => '175',
                'nat_desc' => 'German',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:08',
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'natno' => '176',
                'nat_desc' => 'Ghanaian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:07',
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'natno' => '177',
                'nat_desc' => 'Greek',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:07',
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'natno' => '178',
                'nat_desc' => 'Guatemalan',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:06',
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'natno' => '179',
                'nat_desc' => 'Haitian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:05',
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'natno' => '180',
                'nat_desc' => 'Honduran',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:05',
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'natno' => '181',
                'nat_desc' => 'Indonesian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:04',
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'natno' => '182',
                'nat_desc' => 'Iranian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:03',
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'natno' => '183',
                'nat_desc' => 'Irish',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:03',
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'natno' => '184',
                'nat_desc' => 'Israeli',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:02',
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'natno' => '185',
                'nat_desc' => 'Italian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2016-12-20 00:26:00',
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'natno' => '186',
                'nat_desc' => 'Japanese',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:26:00',
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'natno' => '187',
                'nat_desc' => 'Jordanian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:59',
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'natno' => '188',
                'nat_desc' => 'Kenyan',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:58',
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'natno' => '189',
                'nat_desc' => 'Laotian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:58',
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'natno' => '190',
                'nat_desc' => 'Latvian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:57',
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'natno' => '191',
                'nat_desc' => 'Lebanese',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:57',
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'natno' => '192',
                'nat_desc' => 'Lithuanian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:56',
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'natno' => '193',
                'nat_desc' => 'Malaysian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:56',
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'natno' => '194',
                'nat_desc' => 'Mexican',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:55',
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'natno' => '195',
                'nat_desc' => 'Moroccan',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:54',
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'natno' => '196',
                'nat_desc' => 'Dutch',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:54',
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'natno' => '197',
                'nat_desc' => 'New Zealander',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:53',
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'natno' => '198',
                'nat_desc' => 'Nicaraguan',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:52',
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'natno' => '199',
                'nat_desc' => 'Norwegian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:52',
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'natno' => '200',
                'nat_desc' => 'Panamanian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:51',
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'natno' => '201',
                'nat_desc' => 'Paraguayan',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:51',
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'natno' => '202',
                'nat_desc' => 'Peruvian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:50',
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'natno' => '203',
                'nat_desc' => 'Filipino',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:50',
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'natno' => '204',
                'nat_desc' => 'Polish',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:49',
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'natno' => '205',
                'nat_desc' => 'Portuguese',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:49',
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'natno' => '206',
                'nat_desc' => 'Puerto Rican',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:48',
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'natno' => '207',
                'nat_desc' => 'Romanian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:47',
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'natno' => '208',
                'nat_desc' => 'Russian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:47',
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'natno' => '209',
                'nat_desc' => 'Saudi',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:46',
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'natno' => '210',
                'nat_desc' => 'Scottish',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:46',
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'natno' => '211',
                'nat_desc' => 'Korean',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:45',
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'natno' => '212',
                'nat_desc' => 'Spanish',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:45',
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'natno' => '213',
                'nat_desc' => 'Swedish',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:44',
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'natno' => '214',
                'nat_desc' => 'Swiss',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:44',
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'natno' => '215',
                'nat_desc' => 'Taiwanese',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:43',
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'natno' => '216',
                'nat_desc' => 'Tajik',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:43',
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'natno' => '217',
                'nat_desc' => 'Thai',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:42',
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'natno' => '218',
                'nat_desc' => 'Turkish',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:41',
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'natno' => '219',
                'nat_desc' => 'Ukrainian',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2016-12-20 00:25:39',
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'natno' => '220',
                'nat_desc' => 'British',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:37',
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'natno' => '221',
                'nat_desc' => 'American **',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 00:25:35',
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'natno' => '222',
                'nat_desc' => 'Uruguayan',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 15:20:01',
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'natno' => '223',
                'nat_desc' => 'Venezuelan',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 15:20:01',
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'natno' => '224',
                'nat_desc' => 'Vietnamese',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 15:20:00',
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'natno' => '225',
                'nat_desc' => 'Welsh',
                'nat_desc_ar' => NULL,
                'nat_actv' => NULL,
                'created_at' => '2017-12-20 15:19:57',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
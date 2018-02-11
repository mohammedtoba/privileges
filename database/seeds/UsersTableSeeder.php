<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Ahmad Tharwt',
                'name_ar' => 'Ahmad Tharwt',
                'email' => 'ahmadtharwt@gmail.com',
                'password' => '$2y$10$JdTqqt6wwofImFzIizz6Fu2ZDm1/vmtjwztdZ6qiCcTxD7mw9i1te',
                'remember_token' => 'Y8umYlbHrEwOCQmAqTgEq4ogBRIZGieCNwovNsjaB1uEksj3ZAqy77uiNRWM',
                'usrtype' => 'M',
                'usractv' => NULL,
                'empno' => '12345',
                'depno' => '2',
                'role_id' => '1',
                'created_at' => '2017-12-19 23:31:42',
                'updated_at' => '2018-01-05 22:13:34',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Ibraheem Saeed',
                'name_ar' => 'Ibraheem Saeed',
                'email' => 'akhvsidyvw@uniun.com',
                'password' => '$2y$10$C//mvqmRNAfMj/f9JGe3tu.FN.muJ./0AmU5gGnwsFeI9VR/72bn6',
                'remember_token' => 'zaxfRaqIFKccsljhbAPJ9y1KAJYcgM2o4z3LJOUxCGkzhrI4xmZ7ey3txnpr',
                'usrtype' => 'B',
                'usractv' => NULL,
                'empno' => '65849',
                'depno' => '1',
                'role_id' => '2',
                'created_at' => '2017-12-26 21:47:16',
                'updated_at' => '2017-12-26 21:47:16',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Samir Ali',
                'name_ar' => 'Samir Ali',
                'email' => 'aslnbo@hsi.com',
                'password' => '$2y$10$/h1x/ceOGqTadBBT4QbhJe5ixUyVhOqEIc5YiiP9PUCl/WgJhX1v6',
                'remember_token' => NULL,
                'usrtype' => 'M',
                'usractv' => NULL,
                'empno' => '87556',
                'depno' => '4',
                'role_id' => '3',
                'created_at' => '2017-12-26 22:16:45',
                'updated_at' => '2018-01-05 22:13:41',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Samir Ali',
                'name_ar' => 'Samir Ali',
                'email' => 'aslnbo@hssi.com',
                'password' => '$2y$10$gzGeZaRcb4hjMxG5Yp/7yuHsdVJmbLCCuu7SjRN11fpaRvvz0k7Xq',
                'remember_token' => 'MIRoJz8ItawcQBquuEG7w0lCaQKYTrxyE6mZlXrRQjk9u3XxQxT6cwNRT8Bu',
                'usrtype' => 'B',
                'usractv' => NULL,
                'empno' => '87456',
                'depno' => '3',
                'role_id' => '2',
                'created_at' => '2017-12-26 22:26:07',
                'updated_at' => '2017-12-26 22:26:07',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Samia Osman',
                'name_ar' => 'Samia Osman',
                'email' => 'samai@safe.com',
                'password' => '$2y$10$W.bdG5FMzvVvbdrqcugSweqgWYAIpavwRd3XZheLejhYRfAJ9GMGy',
                'remember_token' => 'Ycl18BfZLr9RkvyXUuVLeQIRD5maPLuTYvM7vAOSXZTHEnNyCUYTYXcao3KE',
                'usrtype' => 'M',
                'usractv' => NULL,
                'empno' => '46389',
                'depno' => '5',
                'role_id' => '3',
                'created_at' => '2017-12-26 22:29:51',
                'updated_at' => '2018-01-05 22:13:29',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Samia Osman Ali',
                'name_ar' => 'Samia Osman',
                'email' => 'samais@safe.com',
                'password' => '$2y$10$GEVyuJw7vnNyQ7fQK0tRBOATJj3LD3ETBAj1jCLIDXThaylvqxDWW',
                'remember_token' => 'AQpaiJKMDnH007I05l6u9qu1zBF7eaRESJfLaXo99Bom2LWhpmNQxzBEVp1o',
                'usrtype' => 'B',
                'usractv' => NULL,
                'empno' => '46388',
                'depno' => '3',
                'role_id' => '6',
                'created_at' => '2017-12-26 22:34:32',
                'updated_at' => '2017-12-26 22:34:32',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'Ali Ibraheem',
                'name_ar' => 'Ali Ibraheem',
                'email' => 'ali@safe.com',
                'password' => '$2y$10$xfWapb4grMQKJbAgw1zdbONLdR1vj57K72oELAO51hpt.RWKEZ7uG',
                'remember_token' => NULL,
                'usrtype' => 'M',
                'usractv' => NULL,
                'empno' => '75830',
                'depno' => '3',
                'role_id' => '3',
                'created_at' => '2017-12-26 22:36:32',
                'updated_at' => '2018-01-05 22:13:38',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'Ali Ibraheem',
                'name_ar' => 'Ali Ibraheem',
                'email' => 'a6li@safe.com',
                'password' => '$2y$10$w1UnZL.Iv/zQIcM..38s6efcBgcBbcOEHqfZHK5Zw3/exH1V8Qnpq',
                'remember_token' => NULL,
                'usrtype' => 'M',
                'usractv' => NULL,
                'empno' => '75860',
                'depno' => '2',
                'role_id' => '3',
                'created_at' => '2017-12-26 22:40:30',
                'updated_at' => '2018-01-05 22:13:46',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'Ali Ibraheem',
                'name_ar' => 'Ali Ibraheem',
                'email' => 'a6li3@safe.com',
                'password' => '$2y$10$ipjGgy9qOarfYcKTcNxJK.l4K4k6WR7HlEnnpjZ934YsgvTXXwZf6',
                'remember_token' => 'Y7JtNrfLOw8P6bqYDqY4ZtgvFKM3mqIitachfxGvECLrzCSCBGmcSamxZWbs',
                'usrtype' => 'B',
                'usractv' => NULL,
                'empno' => '75800',
                'depno' => '3',
                'role_id' => '6',
                'created_at' => '2017-12-26 22:42:15',
                'updated_at' => '2017-12-26 22:42:15',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'Ali Ibraheem',
                'name_ar' => 'Ali Ibraheem',
                'email' => 'a6li3gb@safe.com',
                'password' => '$2y$10$vKjX5e9o8mPvdFC0ofRmi.IW4uNPyB8uPrgbMXPNKgodaBA389cxm',
                'remember_token' => 'XfO0j1tAonEJeBqDWFcgtjAQdITmdHpQ4ECEk1u5ifsE3gnmYArU9OnwoUV6',
                'usrtype' => 'B',
                'usractv' => NULL,
                'empno' => '75810',
                'depno' => '1',
                'role_id' => '2',
                'created_at' => '2017-12-26 22:43:35',
                'updated_at' => '2017-12-26 22:43:35',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'John',
                'name_ar' => 'John',
                'email' => 'john@safe.com',
                'password' => '$2y$10$7cdiA.BdVDRGYdnfLc/srud9.ZM86PO9T3TFB2UUkFxIbZZRtv3Ki',
                'remember_token' => NULL,
                'usrtype' => 'M',
                'usractv' => NULL,
                'empno' => '12347',
                'depno' => '5',
                'role_id' => '3',
                'created_at' => '2017-12-26 22:44:26',
                'updated_at' => '2018-01-05 22:13:43',
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'John',
                'name_ar' => 'John',
                'email' => 'johkn@safe.com',
                'password' => '$2y$10$ubThsncVtcruVLqMnx3hMudstM6dHjhzpP4jWVfupxkWS2nZwecga',
                'remember_token' => 'rDQ7I807UatbR3R72DPn7Oom7uI25c5xv3xCGdN4RavwGwjtbQvsS5WqxFYY',
                'usrtype' => 'M',
                'usractv' => NULL,
                'empno' => '12340',
                'depno' => '3',
                'role_id' => '3',
                'created_at' => '2017-12-26 22:45:30',
                'updated_at' => '2018-01-05 22:13:32',
            ),
            12 => 
            array (
                'id' => 14,
                'name' => 'Ayman Ali',
                'name_ar' => 'أيمن علي',
                'email' => 'koki_iv@gmail.com',
                'password' => '$2y$10$KhyyRGFlwemI5kGR6BgB..aJlNA6aj4cvntxWDP87mbcMJiBSQLj6',
                'remember_token' => 'LzGUWmbjmqeESPMdADMSWWnl86sMg7wRwXGQgZbMnSp3TuNNTXD9iI8Amxl1',
                'usrtype' => 'M',
                'usractv' => NULL,
                'empno' => '63518',
                'depno' => '6',
                'role_id' => '3',
                'created_at' => '2018-01-01 21:52:33',
                'updated_at' => '2018-01-05 22:13:27',
            ),
            13 => 
            array (
                'id' => 15,
                'name' => 'AbdelMoneim',
                'name_ar' => 'عبد المنعم',
                'email' => 'vito@yahoo.com',
                'password' => '$2y$10$14NDTSHftQCzLvPTe8gFE.EGBscfXdzq9SJ3Z9ITdXN4nIGDjQo2W',
                'remember_token' => '1z6w1gsCKiJnvrBXCIwDmxds2BvZ4Qv8neZL3qfZ57XHitsz27zkxttykh73',
                'usrtype' => 'M',
                'usractv' => NULL,
                'empno' => '73291',
                'depno' => '2',
                'role_id' => '4',
                'created_at' => '2018-01-01 21:55:14',
                'updated_at' => '2018-01-01 21:55:14',
            ),
            14 => 
            array (
                'id' => 16,
                'name' => 'Lamiaa',
                'name_ar' => 'Ibraheem',
                'email' => 'lamiaa@safe.com',
                'password' => '$2y$10$9clJD00zHtjpm16fyKDJIOmDUuBusIPUZyBq4ih7d0vGcgyA25rle',
                'remember_token' => 'VBpwoY4zA1bfZhQADYhyJFIDAwrUiq2OJn461lEJ17Z3gK6NYO3a02eTxOWS',
                'usrtype' => 'M',
                'usractv' => NULL,
                'empno' => '12342',
                'depno' => '23',
                'role_id' => '4',
                'created_at' => '2018-01-05 21:00:55',
                'updated_at' => '2018-01-05 21:00:55',
            ),
            15 => 
            array (
                'id' => 17,
                'name' => 'Ismaeel',
                'name_ar' => 'Radi',
                'email' => 'ismaeel@safe.com',
                'password' => '$2y$10$G9VGf26YB11EPytc/ApfuOEcwtYT6jyn5t.sgdqf4E6Q/stTMBGHS',
                'remember_token' => NULL,
                'usrtype' => 'M',
                'usractv' => NULL,
                'empno' => '98765',
                'depno' => '3',
                'role_id' => '4',
                'created_at' => '2018-01-05 23:57:53',
                'updated_at' => '2018-01-06 00:03:05',
            ),
        ));
        
        
    }
}
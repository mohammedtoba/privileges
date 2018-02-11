<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Templ_Groups extends Model
{
    protected $table='templ_groups';
    protected $fillable = ['id','templno','grp_cod','grp_desc','grp_desc_ar',
    						'grp_actv','dep_list',];
}


/*CREATE TABLE `templ_groups` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`templno` VARCHAR(10) NULL DEFAULT '0',
	`grp_cod` VARCHAR(10) NULL DEFAULT '0',
	`grp_desc` VARCHAR(191) NULL DEFAULT '0',
	`grp_desc_ar` VARCHAR(191) NULL DEFAULT '0',
	`grp_actv` VARCHAR(1) NULL DEFAULT '0',
	`dep_list` VARCHAR(191) NULL DEFAULT '0',
	PRIMARY KEY (`id`),
	INDEX `templno` (`templno`)
)
COLLATE='utf8mb4_general_ci'
ENGINE=MyISAM
;
*/
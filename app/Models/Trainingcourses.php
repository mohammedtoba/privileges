<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainingcourses extends Model
{

	protected $fillable = [ 'id','medstaff_id', 'train_desc', 'train_country', 'train_workplace' ,'train_startdt' ,'train_enddt', 'train_file_upload'  , 'train_notes' ,  
	  'train_phone','train_email','train_fax',
     ];

    protected $table='trainingcourses';
}

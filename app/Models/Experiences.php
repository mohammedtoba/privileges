<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
	protected $fillable = [ 'id','medstaff_id', 'exper_position', 'exper_country', 'exper_workplace' ,'exper_startdt' ,'exper_enddt', 'exper_file_upload'  , 'exper_notes' ,  
	  'exper_phone','exper_email','exper_fax',
     ];

    protected $table='experiences';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivTypes extends Model
{
     protected $table='privtypes';
     protected $fillable =[ 
	     				'id','type_desc', 'type_desc_ar', 'type_actv',
	        			  ];
}

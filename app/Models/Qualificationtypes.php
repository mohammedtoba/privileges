<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qualificationtypes extends Model
{

	protected $fillable = [  'qual_typ', 'qual_typ_desc', 'qual_typ_desc_ar' ,  'qual_typ_actv' ,  
     ];


    protected $table='qualificationtypes';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Templevaludet extends Model
{
       protected $table='templevaludet';

       protected $fillable = ['templdetno','templno','scope','category','templdet_desc','templdet_desc_ar',
       'templdet_score', 'templdet_actv',];

       public function detailsScore() {
			return $this->hasMany('App\Models\Staffevaluationdet','templdetno','templdetno');
		}
            
}

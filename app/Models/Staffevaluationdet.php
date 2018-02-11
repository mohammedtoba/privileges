<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Staffevaluationdet extends Model
{
    protected $table='staffevaluationdet';
        protected $fillable =[
        'id','medstaff_id','templno','eval_id','templdetno','staff_score','comments','max_score',
        ];
        public function detailsItem() {
			return $this->hasMany('App\Models\Staffevaluationdet','templdetno','templdetno');
		}
}

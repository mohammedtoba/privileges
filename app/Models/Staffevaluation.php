<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Staffevaluation extends Model
{
        protected $table='staffevaluation';
        protected $fillable =[
        'id','medstaff_id','templdetno','templno','staff_score','eval_typ','overall_rate','eval_grade', 'recomnd_oppor','recomnd_goals', 'head_comment','head_sign','head_sign_dat','staff_sign', 'staff_sign_dat',
        ];

        Protected $dates=[
        	'head_sign_dat','staff_sign_dat',
        ];

        protected $appends = [
	    	'headSignAt',
	    	'staffSignAt',
	    	'evaluationType',
	    	'humanCreatedAt',
	    ];

        public function getEvaluationTypeAttribute($value){
	        switch ($this->eval_typ) {
			    case 'A':
			        $evalType = 'Annual';
			        break;
			    case 'P':
			        $evalType = 'Propational';
			        break;
			    case 'F':
			        $evalType = 'Focused';
			        break;
			}
			return $evalType;
	    }

        public function getHeadSignAtAttribute() {
			return Carbon::parse($this->attributes['created_at'])->diffForHumans();
		}

		public function getStaffSignAtAttribute() {
			return Carbon::parse($this->attributes['staff_sign_dat'])->diffForHumans();
		}

		public function getHumanCreatedAtAttribute() {
			return Carbon::parse($this->attributes['created_at'])->diffForHumans();
		}

		public function detail() {
			return $this->hasMany('App\Models\Staffevaluationdet','eval_id','id');
		}

		

}

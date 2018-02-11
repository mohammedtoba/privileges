<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $table='departments';
    protected $fillable = ['id','dept_nam','dept_nam_ar','head_userid','parent_depno','dept_actv',
	
							];
	public function childs() {
        return $this->hasMany('App\Models\Departments','parent_depno','id') ;
    }

    public function hasMedicalStaffs() {
		return $this->hasMany(Medicalstaffs::class,'depno','id') ;
	}

	public function staffEvaluation() {
		return $this->hasManyThrough(
            'App\Models\Staffevaluation',
            'App\Models\Medicalstaffs',
            'depno', // Foreign key on users table...
            'medstaff_id', // Foreign key on posts table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
	}


	
            
}

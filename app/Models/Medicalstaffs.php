<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use App\Models\Departments; 
use App\Models\User;
use Carbon\Carbon;

class Medicalstaffs extends Model
{
    protected $table='medicalstaff';

    protected $fillable = [ 'id','user_id', 'first_name', 'second_name', 'third_name' ,'family_name' ,'full_name', 'first_name_ar', 'second_name_ar' , 'third_name_ar' , 'family_name_ar' , 'full_name_ar' , 'natno', 'catgno' , 'depno' , 'jobno', 'dispno', 'empno' , 'dob' , 'gender' , 'phone' , 'mobile' , 'address', 'licence_no' , 'join_date', 'med_actv',
     ];
    protected $appends = [
    	'fullName',
    	'humanCreatedAt',
    ];

    public function User() {
		return $this->belongsTo(User::class);
	}

	public function getHumanCreatedAtAttribute() {
		return Carbon::parse($this->attributes['created_at'])->diffForHumans();
	}
	public function getFullNameAttribute() {
		return $this->first_name.' '.$this->second_name.' '.$this->family_name;
	}

	public function department() {
		return $this->hasOne(Departments::class,'id','depno');
	}

	public function nationality() {
		return $this->hasOne('App\Models\Nationalities','natno','natno');
	}
	
	public function speciality() {
		return $this->hasOne('App\Models\Specialities','specno','specno');
	}
	
	public function category() {
		return $this->hasOne('App\Models\Categories','catgno','catgno');
	}

	public function discipline() {
		return $this->hasOne('App\Models\Disciplines','dispno','dispno');
	}
	public function evaluation() {
		return $this->hasMany('App\Models\Staffevaluation','medstaff_id','id');
	}
	public function privilege() {
		return $this->hasMany('App\Models\StaffPrivileges','medstaff_id','id');
	}
	public function lastEval(){
		    return $this->hasOne('App\Models\Staffevaluation','medstaff_id','id')->orderBy('created_at', 'desc');
	}
	public function lastPriv(){
		    return $this->hasOne('App\Models\StaffPrivileges','medstaff_id','id')->orderBy('created_at', 'desc');
	}

}

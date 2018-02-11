<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffPrivileges extends Model
{
     protected $table='staffprivileges';
        protected $fillable =[
         'id' , 'medstaff_id','templno', 'specno', 'catgno', 'privtyp_id','priv_status',
         'head_comment','head_approv_dt','head_return_dt','committe_comment','committe_approv_dt','committe_return_dt',
        ]; 
        protected $primarykey = ['id'];

    public function medicalstaff(){
    	return $this->belongsTo('App\Models\Medicalstaffs','medstaff_id','id');
    } 

    public function privType(){
    	return $this->hasOne('App\Models\PrivTypes', 'id', 'privtyp_id');
    }
}

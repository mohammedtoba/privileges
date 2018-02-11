<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplPrivDet extends Model
{
     protected $table='templprivdet';
        protected $fillable =[
         'templno', 'templdetno', 'templdet_desc', 'templdet_desc_ar',
        'catgno','group_desc', 'proced_code', 'proced_desc' ,'templdet_actv',
        ];

    public function hasMaster(){
    	return $this->belongsTo('App\Models\Templevalumst','templno','templno');
    }
    public function itemScore(){
    	return $this->hasOne('App\Models\StaffPrivilegesDet','templdetno','templdetno');
    }

       
}

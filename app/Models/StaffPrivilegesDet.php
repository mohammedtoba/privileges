<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffPrivilegesDet extends Model
{
    protected $table='staffprivilegesdet';
        protected $fillable =[
        'id','staffpriv_id', 'medstaff_id','templno','templdetno', 'specno',
        'catgno','staff_deci_id','staff_comment','head_deci_id','head_comment',
        'committe_deci_id' , 'committe_comment',
        ];
    protected $primarykey = ['id'];

    Public function description(){
        return $this->hasOne('App\Models\TemplPrivDet','templdetno','templdetno');
    } 

    public function  committeeDecision() {
            return $this->hasOne('App\Models\privdecisions','id','committe_deci_id');
        }
}

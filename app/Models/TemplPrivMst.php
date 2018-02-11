<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TemplPrivMst extends Model
{
    protected $table='templprivmst';
    protected $fillable =[ 'templno', 'templ_desc', 'templ_desc_ar', 'specno' ,'templ_actv', 'prepared_by', 'approved_by',];
    protected $primaryKey = 'templno';
	public function childs() 
		{
	    return $this->hasMany('App\Models\Templ_Groups','templno','templno') ;
	    }
}

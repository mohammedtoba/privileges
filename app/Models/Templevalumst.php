<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Templevalumst extends Model
{
    protected $table='templevalumst';

    protected $fillable =[ 
    	'templno','templ_desc','templ_desc_ar','templ_score','templ_actv'
    	]; 
    public function detail() {
			return $this->hasMany('App\Models\templevaludet','templno','templno');
		}
}

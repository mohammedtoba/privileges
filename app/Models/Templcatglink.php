<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Templcatglink extends Model
{
    protected $table='templcatglink';

    public function category() {
		return $this->hasMany('App\Models\Categories','catgno','catgno');
	}

	
}

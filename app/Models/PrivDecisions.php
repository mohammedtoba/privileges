<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivDecisions extends Model
{
     protected $table='privdecisions';
        protected $fillable =[
         'id','dec_desc',  'dec_desc_ar', 'dec_actv',
        ];
}

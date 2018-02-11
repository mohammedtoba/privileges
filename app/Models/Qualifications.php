<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Qualifications extends Model
{
	protected $fillable = [ 'id','medstaff_id', 'qualif_desc', 'qualif_year', 'qualif_country' ,'qualif_univ' ,'college','clg_phone','clg_email','clg_fax','qual_typ', 'qualif_file_upload', 'qualif_notes' ,  
     ];
     public $sortable = ['medstaff_id', 'qualif_desc', 'qualif_year', 'qualif_country' ,'qualif_univ' ,'qual_typ',
 ];


     

        protected $table='qualifications';
}

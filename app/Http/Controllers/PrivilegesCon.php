<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use DB;
use Storage;
use Carbon\Carbon;
use App\Models\StaffPrivileges;
use App\Models\StaffPrivilegesDet;
use App\Models\Medicalstaffs;
use App\Models\Categories;
use App\Models\Departments;
use App\Models\Specialities;
use App\Models\TemplPrivDet;
use App\Models\TemplPrivMst;
use App\Models\PrivDecisions;
use App\Models\PrivTypes;
use App\Models\PrivStatus;

use Illuminate\Support\Facades\Auth;

class PrivilegesCon extends Controller
{
  	public function new($medstaff_id, $privtyp_id){
      $med = Medicalstaffs::with('speciality','category','lastPriv')->where('id',$medstaff_id)->get();//dd($med);
      $template = TemplPrivMst::where('templ_actv','Y')->where('specno',$med[0]->speciality->specno)->orderBy('created_at','desc')->first();
      $data = [   'medstaff_id' => $med[0]->id,
                    'privtyp_id' =>  $privtyp_id,
                    'templno' => $template ['templno'],
                    'specno' => $med[0]->speciality->specno,
                    'catgno' => $med[0]->category->catgno,
                    'priv_status' => 'R' ,
                  ];
      $stfpriv =   StaffPrivileges::Create($data);

      //dd($stfpriv->id);
      return redirect()->route('apply', ['priv_id' => $stfpriv->id ]);
    }
    public function List()
  	{
			$parm =   Route::currentRouteName();
  			if ( $parm  == 'stflist' ) {
  			   $parm = 'S' ;
  			   $wher = ['MS' , 'R']  ;
           $loginMedID = MedicalStaffs::where('user_id',Auth::user()->id)->first()->id;
           $ListForPriv= StaffPrivileges::with('medicalstaff','medicalstaff.speciality','medicalstaff.department','medicalstaff.category')->whereIn('priv_status', $wher )->where('medstaff_id',$loginMedID)->get();
  			}elseif ($parm  == 'headlist'){
  			  $parm = 'H' ;
			    $wher = ['HS' , 'WH']  ;
          $dep = Departments::with('hasMedicalStaffs')->where('head_userid',Auth::user()->id)->pluck('id');
          $MedID = StaffPrivileges::whereIn('priv_status', $wher)->pluck('medstaff_id');
          $ListForPriv= Medicalstaffs::with('speciality','category', 'department','lastPriv')
            ->whereIn('depno', $dep )
            ->where('med_actv','Y')
            ->whereIn('id',$MedID)
            ->get();
          //dd($d);
  			}else {
  			  $parm = 'C' ;
          $wher = ['CS' , 'WC']  ;
          $MedID = StaffPrivileges::whereIn('priv_status', $wher)->pluck('medstaff_id');
          $ListForPriv= Medicalstaffs::with('speciality','category', 'department','lastPriv')
            ->where('med_actv','Y')
            ->whereIn('id',$MedID)
            ->get();
      	}

			
  			return view ("Priviliges.list",[  'LisT' => $ListForPriv,  'ParM' => $parm ,  ]);  
    }

    public function Form( $prvid )
  	{  

      $prv = StaffPrivileges::with('medicalstaff','privType','medicalstaff.speciality','medicalstaff.department','medicalstaff.category')->where('id',  $prvid)->get();
      $groups=TemplPrivDet::where('templno',$prv[0]->templno)->select('group_desc')->distinct()->get();
      $cat = DB::table('templprivdet')
         ->where('templno',$prv[0]->templno)
         ->where('catgno','<=',$prv[0]->catgno) //get the consultant and below and so on
         ->select('catgno','group_desc', DB::raw('count(*) as count'))
         ->groupBy('catgno','group_desc')
         ->get();   
      $privdec = PrivDecisions::get();
      $tempDetail = TemplPrivDet::with(
        ['itemScore'=> function($query) use($prvid){
                          $query->where('staffpriv_id',$prvid);
                        }])
        ->where('templno',$prv[0]->templno)
        ->where('catgno', '<=',$prv[0]->catgno) //get the consultant and below and so on
        ->get(); //dd($tempDetail,$groups);
      $privdec = PrivDecisions::get();
      $count = count($tempDetail);
      $parm =   Route::currentRouteName();
        //dd ($parm);
        if ( $parm  == 'apply' ) {
          $parm = 'S' ;    
        }elseif ($parm  == 'recommend'){
          $parm = 'H' ;
        }elseif ($parm  == 'finalize') {
          $parm = 'C' ;
        }elseif ($parm  == 'showPriv'){
          $parm = 'SH' ;
        }
        //$parm='C';
        
      return view('Priviliges.privilege',[  'temp' => $tempDetail,
                                            /*'StfPriv' => $rreq,*/
                                            'groups' => $groups,
                                            'category' => $cat,
                                            'c' => $count,
                                            'PriV'=> $privdec,
                                            'priv'=>$prv,
                                            'parm'=>$parm,
                                          ]);
    }

  
  	public function Save( Request $request )
  	{
  		  //dd($request);
        $parm =   Route::currentRouteName();
         // dd($priv_id);
        if ( $parm  == 'savePrivS' ) {
            $parm = 'S' ;
            $routeName = 'apply';
            $status = 'MS';
          }
		    elseif ($parm  == 'savePrivH'){
            $parm = 'H' ;
            $routeName ='recommend';
            $status = 'HS';
        }elseif ($parm  == 'savePrivC') {
            $parm = 'C' ;
            $routeName = 'finalize';
            $status = 'CS';
        }
            //dd($parm);
            //   return "Save" ;

        for ($i=1; $i <=($request ->count + 1) ; $i++) 
        { 
            $data_find = 
                  [
                    'staffpriv_id' =>  $request ['staffpriv_id'] ,
                    'medstaff_id' => $request ['medstaff_id'],
                    'templno' => $request ['templno'],
                    'specno' => $request ['specno'],
                    'catgno' => $request ['catgno'],
                    'templdetno' => $request ['templdetno'.$i],
                  ];
            if ( $parm  == 'S' ) {
                 $data_details=
                  [
                    'staff_deci_id' => $request ['staff_deci_id'.$i],
                    'staff_comment' => $request ['staff_comment'.$i],
                  ];
            }elseif ($parm  == 'H'){
                  $data_details=
                  [
                    'head_deci_id' => $request ['head_deci_id'.$i],
                    'head_comment' => $request ['head_comment'.$i],
                    ];
            }elseif ($parm  == 'C') {
                  $data_details=
                  [
                    'committe_deci_id' => $request ['committe_deci_id'.$i],
                    'committe_comment' => $request ['committe_comment'.$i],
                  ];
            }
            $tmpldet = StaffPrivilegesDet::updateOrCreate( $data_find , $data_details  );
        }
        
        StaffPrivileges::where('id',$request ['staffpriv_id'])->update(['priv_status' => $status]);
        return redirect()->route( $routeName, ['priv_id' => $request ['staffpriv_id'] ]);        
      }

    public function Submit( Request $request )
      {
        //dd($request);
       $parm =   Route::currentRouteName();
          //dd($parm , $priv_id , $request );
        if ( $parm  == 'submitPrivS' ) {
                    $parm = 'S' ;
          }elseif ($parm  == 'submitPrivH'){
                    $parm = 'H' ;
          }elseif ($parm  == 'submitPrivC') {
                    $parm = 'C' ;
          }
        for ($i=1; $i <=($request ->count + 1) ; $i++) 
        { 
            $data_find = 
                  [
                    'staffpriv_id' =>  $request ['staffpriv_id'] ,
                    'medstaff_id' => $request ['medstaff_id'],
                    'templno' => $request ['templno'],
                    'specno' => $request ['specno'],
                    'catgno' => $request ['catgno'],
                    'templdetno' => $request ['templdetno'.$i],
                  ];
            if ( $parm  == 'S' ) {
                 $data_details=
                  [
                    'staff_deci_id' => $request ['staff_deci_id'.$i],
                    'staff_comment' => $request ['staff_comment'.$i],
                  ];
            }elseif ($parm  == 'H'){
                  $data_details=
                  [
                    'head_deci_id' => $request ['head_deci_id'.$i],
                    'head_comment' => $request ['head_comment'.$i],
                    ];
            }elseif ($parm  == 'C') {
                  $data_details=
                  [
                    'committe_deci_id' => $request ['committe_deci_id'.$i],
                    'committe_comment' => $request ['committe_comment'.$i],
                  ];
            }
            $tmpldet = StaffPrivilegesDet::updateOrCreate( $data_find , $data_details  );
        }
          if ( $parm  == 'S' ) {
            $parm = 'S' ;
            $routeName = 'stflist';
            StaffPrivileges::where('id',$request ['staffpriv_id'])
            ->update([
                'priv_status' => 'WH',
                'staff_submit_dt' =>  NOW(),
              ]);
          }elseif ($parm  == 'H'){
            $parm = 'H' ;
            $routeName = 'headlist';
            $status = 'WC';
            StaffPrivileges::where('id',$request ['staffpriv_id'])
            ->update([
                'priv_status' => 'WC',
                'head_user_id' => Auth::user()->id,
                'head_approv_dt' => NOW(),
              ]);
          }elseif ($parm  == 'C') {
            $parm = 'C' ;
            $routeName = 'commlist';
            $status = 'F';
            StaffPrivileges::where('id',$request ['staffpriv_id'])
            ->update([
                'priv_status' => 'F',
                'committee_user_id' => Auth::user()->id,
                'committe_approv_dt' => NOW(),
              ]);
          }
          return redirect()->route( $routeName );
      }

      public function Privlist() {
        //$wher = 'F'  ;
        $dep = Departments::with('hasMedicalStaffs')->where('head_userid',Auth::user()->id)->pluck('id');
        $deps = Departments::where('head_userid',Auth::user()->id)->get();
        //$MedID = StaffPrivileges::whereIn('priv_status', $wher)->pluck('medstaff_id');
        $ListWithPriv= Medicalstaffs::with('speciality','category', 'department','lastPriv')
          ->whereIn('depno', $dep )
          ->where('med_actv','Y')
          //->whereIn('id',$MedID)
          ->get();
        $Decisions  = PrivDecisions::get();
        $types  = PrivTypes::get();
        $status  = PrivStatus::get();
            
        return view ("Priviliges.privlist",[  'LisT' => $ListWithPriv,
                                              'depts' => $deps, 
                                            ]);  


      }
        
}


  
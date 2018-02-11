<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Storage;

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

use Illuminate\Support\Facades\Auth;


class PrivilegesCon extends Controller
{



    
  public function priv_req(){
  // dd(Auth::user()->id);
          $medstf = DB::table('medicalstaff') 
            ->leftJoin('departments', 'medicalstaff.depno', '=', 'departments.id')
            ->leftJoin('categories', 'medicalstaff.catgno', '=', 'categories.catgno')
            ->leftJoin('specialities', 'medicalstaff.specno', '=', 'specialities.specno')
            ->where('medicalstaff.user_id', '=',Auth::user()->id )
            ->select( 'medicalstaff.id', 'medicalstaff.full_name',    'medicalstaff.catgno',    'medicalstaff.specno as specno' , 'medicalstaff.depno'  
              , 'departments.dept_nam','categories.catg_desc','specialities.spec_desc'  
              ,'medicalstaff.join_date'    
            )->get(); 
        //  dd($medstf); 
            //dd( $medstf[0]->specno   );
     
            $tempID=TemplPrivMst::where('specno','=',$medstf[0]->specno  )->first();
         //   dd ( $tempID );

        $groups=DB::table('templprivdet')->distinct()->where('templno',$tempID->templno)
        ->get(['group_desc']);
      //  dd($medstf[0]->catgno);
        $cat = DB::table('templprivdet')
             ->where('templno',$tempID->templno)
             ->where('catgno',$medstf[0]->catgno)
             ->select('catgno','group_desc', DB::raw('count(*) as count'))
             ->groupBy('catgno','group_desc')
             ->get();
//dd($cat);
        $temde = TemplPrivDet::where('templno',$tempID->templno)
            ->where('catgno',$medstf[0]->catgno)
            ->orderBy('group_desc','asc')
            ->get();
//dd ($temde);
        $count = count($temde);
   // dd ($temde);
        $privdec = PrivDecisions::get();

         $date_now = new \DateTime();
         $date2    = new \DateTime("01/02/2016");
            //dd($medstf[0]->join_date );
       //      dd($medstf[0]->join_date );
      //  if ($date_now < $medstf[0]->join_date) {
                $prvtyp = PrivTypes::find(1);
        //    }else{
        //       $prvtyp = PrivTypes::find(3);
        //    }
       //  dd($prvtyp );
       // $prvtyp = PrivTypes::get();
        return view('Priviliges.priv_req',[  'temp' => $temde,
                                              'PriV' => $prvtyp,
                                              'groups' => $groups,
                                              'category' => $cat,
                                              'c' => $count,
                                              'MedS'=> $medstf,
                                              'DecTyp'=> $privdec,
                                                ]);
        }

  public function   saveStfPriv (Request $e) 
  {
        //$e->validate( ['privtyp_id' => 'required|integer',]);
       // dd($e);
         $stfpriv = new StaffPrivileges();
     //    dd($e->medstaff_id);
            $stfpriv->medstaff_id = $e->medstaff_id;
            $stfpriv->privtyp_id = $e->privtyp_id;
            $stfpriv->templno = $e->templno;
            $stfpriv->specno = $e->specno;
            $stfpriv->catgno = $e->catgno;
            /*priv_status   S SUBMITTED   R REVIEWED   F FINALLIZED*/
            $stfpriv->priv_status = 'S';
            // dd($e->count) ; 

            $ret =   $stfpriv->save();   

        //    dd( $ret) ;
        
        if (  $ret  )
            {
             //  
                $id_p =  $stfpriv->id;
                for ($i=1; $i <=($e->count) ; $i++) 
                { 
                        $tmpldet = new StaffPrivilegesDet();

                        $tmpldet->staffpriv_id = $id_p ;
                        $tmpldet->medstaff_id = $e->medstaff_id;
                        $tmpldet->templno = $e->templno;
                        $tmpldet->templdetno = $e['templdetno'.$i];
                        $tmpldet->specno = $e->specno;
                        $tmpldet->catgno = $e->catgno;
                        $tmpldet->staff_deci_id = $e['staff_deci_id'.$i];
                        $tmpldet->staff_comment = $e['staff_comment'.$i];
                        $tmpldet->save();
                }
            
        $user =  Auth::user();
         $dept = Departments::find(1);
       // Notification::send($user ,  new  PostNewNotification($dept) );
      //  $user ->notify( new App\Notifications\PostNewNotification($dept) );


             return redirect('myreq'); 
         }
    }



 public function MyReq( )
    {
        // $med = Medicalstaffs::where('user_id' ,'=',   Auth::user()->id )->first();
        // //  dd($med);
        // $prv = StaffPrivileges::where('medstaff_id',  $med->id )->get();

        $prv = DB::table('medicalstaff') 
            ->leftJoin('staffprivileges', 'medicalstaff.id', '=', 'staffprivileges.medstaff_id') 
            ->leftJoin('privtypes', 'privtypes.id', '=', 'staffprivileges.privtyp_id') 
            ->where('medicalstaff.user_id', '=', Auth::user()->id )
            ->select( 'staffprivileges.id', 'staffprivileges.created_at',    'privtypes.type_desc'
                ,    'staffprivileges.priv_status'   ,    'staffprivileges.head_approv_dt'   ,    'staffprivileges.committe_approv_dt'  
                
            )->get(); 


        return view ("Priviliges.myrequests",[  'PriV' => $prv, ]);  
    }









  
      public function headList()
      {
          $prv = DB::table('staffprivileges') 
            ->leftJoin('privtypes', 'privtypes.id', '=', 'staffprivileges.privtyp_id') 
            ->leftJoin('medicalstaff', 'medicalstaff.id', '=', 'staffprivileges.medstaff_id') 
            ->leftJoin('departments', 'medicalstaff.depno', '=', 'departments.id')
            ->leftJoin('categories', 'medicalstaff.catgno', '=', 'categories.catgno')
            ->leftJoin('specialities', 'medicalstaff.specno', '=', 'specialities.specno')
            ->where('staffprivileges.priv_status',  'S')
            ->where('departments.head_userid', Auth::user()->id )
            ->select( 'medicalstaff.id', 'medicalstaff.full_name',  'medicalstaff.specno' ,  'medicalstaff.catgno',  'medicalstaff.depno' ,   'medicalstaff.empno'  , 'medicalstaff.med_actv' , 'departments.dept_nam','categories.catg_desc','specialities.spec_desc' ,'staffprivileges.id AS priv_id' ,'staffprivileges.privtyp_id'  ,'staffprivileges.templno','privtypes.type_desc' )->get(); 
       // dd($prv);
        return view ("Priviliges.headpending",[  'PriV' => $prv, ]);  
      }


  public function headStart(Request $e)
        {
          return redirect('privilege/headlist/'.$e->priv_id);
        }

  public function headPriv(  $prvid)
    {
        $rreq=StaffPrivileges::where('id','=',$prvid )->first();
     
        $groups=DB::table('templprivdet')->distinct()
        ->where('templno',$rreq->templno)
        ->get(['group_desc']);
 //      dd($groups);
        $cat = DB::table('templprivdet')->where('catgno',$rreq->catgno)
             ->select('catgno','group_desc', DB::raw('count(*) as count'))
             ->groupBy('catgno','group_desc')
             ->get();
//  dd($cat);
       /* $rreqdet= DB::table('staffprivilegesdet')
        ->Join('templprivdet', 'staffprivilegesdet.templno', '=', 'templprivdet.templno') 
       ->Join('templprivdet as b', 'staffprivilegesdet.catgno', '=', 'b.catgno') 
*/
       /* $rreqdet = DB::table('staffprivilegesdet as s', 'templprivdet as e')
        ->select('s.staff_deci_id', 's.staff_comment', 's.catgno', 's.templdetno' , 'e.templdet_desc', 'e.group_desc')
        ->where('s.templno', '=', 'e.templno')
        ->where('s.templdetno', '=', 'e.templdetno')
        ->where('s.catgno', '=', 'e.catgno')
        ->where('s.staffpriv_id',$prvid )
        ->where('s.templno',$rreq->templno)
        ->where('s.catgno',$rreq->catgno)
        ->orderBy('e.group_desc','asc')    
        ->get();
        dd ($rreqdet); 
*/
        $query =' select   s.staff_deci_id as staff_deci_id ,  s.staff_comment as staff_comment
                  , s.head_deci_id as head_deci_id ,  s.head_comment as head_comment
                  ,  s.templno as  templno,  s.catgno as catgno,  s.templdetno as templdetno
                  ,  e.templdet_desc as templdet_desc,  e.group_desc as group_desc 
                  , t.dec_desc
                  from  staffprivilegesdet as s,  templprivdet as e  , privdecisions as t
                  where s.templno = e.templno and s.templdetno = e.templdetno
                  and  s.catgno = e.catgno and  s.staff_deci_id = t.id
                  and s.staffpriv_id = :id  and  s.templno = :tm  and  s.catgno =  :ct
                  order by e.group_desc  ';

        $temde = DB::select(  $query  , 
          ['id' =>  $prvid   , 'tm' =>  $rreq->templno  , 'ct' =>  $rreq->catgno  ]   );
 // dd ($temde); 
      /*  $temde = TemplPrivDet::where('templno',$rreq->templno)
        ->where('catgno',$rreq->catgno)
            ->orderBy('group_desc','asc')
            ->get();*/
// dd ($temde);
        $count = count($temde);
        $privdec = PrivDecisions::get();
      return view('Priviliges.headprivilege',[   'temp' => $temde,'StfPriv' => $rreq,
                                              'groups' => $groups,'category' => $cat,
                                            'c' => $count,'DecTyp'=> $privdec,
                                              ]);
    }

    

public function headUpdate(Request $e)
      {
              /*$e->validate( [
                    'head_deci_id' => 'required|string|max:191',
                    ]);*/
       //  dd($e);
        $tmpldet = StaffPrivilegesDet::where('staffpriv_id','=',$e->staffpriv_id )->get() ;
     //   dd( count($tmpldet) );

        for ($i=1; $i <=(count($tmpldet)) ; $i++) 
        { 
           // $tmpldet->head_deci_id = $e['head_deci_id'.$i];
          //  $tmpldet->head_comment = $e['head_comment'.$i];
          //  $ret = $tmpldet->save();

            $ddd = $e['head_deci_id'.$i];
            $ccc = $e['head_comment'.$i];
   
        $ret =    DB::update('update staffprivilegesdet set head_deci_id = :ddd  
            , head_comment  = :ccc  where staffpriv_id = :id  and templdetno = :det_no ', 
              [ 'id' => $e->staffpriv_id  , 'det_no' =>  $i   , 'ddd' =>  $ddd   , 'ccc' =>  $ccc   ]);
        }
      
  
         // //$stfpriv = StaffPrivileges::find($tmpldet->staffpriv_id);
        //  $stfpriv = StaffPrivileges::where('id','=',$e->staffpriv_id )->get() ;
        //  $stfpriv->updated_at =date('Y/m/d');
          /*priv_status   S SUBMITTED   R REVIEWED   F FINALLIZED*/
       //   $stfpriv->priv_status = 'R';
       //   $stfpriv->save(); 
            $updte = date('Y/m/d');
            $status = 'R';
            DB::update('update staffprivileges set updated_at = :updte  
            , priv_status  = :status  where id = :id   ', 
              [ 'id' => $e->staffpriv_id  ,  'updte' =>  $updte   , 'status' =>  $status   ]);

          return redirect('privilege/headlist');

    }



 public function commList()
      {
          $prv = DB::table('staffprivileges') 
            ->leftJoin('privtypes', 'privtypes.id', '=', 'staffprivileges.privtyp_id') 
            ->leftJoin('medicalstaff', 'medicalstaff.id', '=', 'staffprivileges.medstaff_id') 
            ->leftJoin('departments', 'medicalstaff.depno', '=', 'departments.id')
            ->leftJoin('categories', 'medicalstaff.catgno', '=', 'categories.catgno')
            ->leftJoin('specialities', 'medicalstaff.specno', '=', 'specialities.specno')
            ->where('staffprivileges.priv_status',  'R')
          /*  ->where('departments.head_userid', Auth::user()->id )*/
            ->select( 'medicalstaff.id', 'medicalstaff.full_name',  'medicalstaff.specno' ,  'medicalstaff.catgno',  'medicalstaff.depno' ,   'medicalstaff.empno'  , 'medicalstaff.med_actv' , 'departments.dept_nam','categories.catg_desc','specialities.spec_desc' ,'staffprivileges.id AS priv_id' ,'staffprivileges.privtyp_id'  ,'staffprivileges.templno','privtypes.type_desc' )->get(); 
       // dd($prv);
        return view ("Priviliges.commpending",[  'PriV' => $prv, ]);  
      }


  public function commStart(Request $e)
        {
          return redirect('privilege/commlist/'.$e->priv_id);
        }

  public function commPriv(  $prvid)
    {
        $rreq=StaffPrivileges::where('id','=',$prvid )->first();
     
        $groups=DB::table('templprivdet')->distinct()
        ->where('templno',$rreq->templno)
        ->get(['group_desc']);
 //      dd($groups);
        $cat = DB::table('templprivdet')->where('catgno',$rreq->catgno)
             ->select('catgno','group_desc', DB::raw('count(*) as count'))
             ->groupBy('catgno','group_desc')
             ->get();
 //dd($rreq);
        $prv = DB::table('staffprivileges') 
            ->leftJoin('privtypes', 'privtypes.id', '=', 'staffprivileges.privtyp_id') 
            ->leftJoin('medicalstaff', 'medicalstaff.id', '=', 'staffprivileges.medstaff_id') 
            ->leftJoin('departments', 'medicalstaff.depno', '=', 'departments.id')
            ->leftJoin('categories', 'medicalstaff.catgno', '=', 'categories.catgno')
            ->leftJoin('specialities', 'medicalstaff.specno', '=', 'specialities.specno')
            //->where('staffprivileges.priv_status',  'S')
            ->where('staffprivileges.id',  $prvid)
            ->select( 'medicalstaff.id', 'medicalstaff.full_name',  'medicalstaff.specno' ,  'medicalstaff.catgno',  'medicalstaff.depno' ,   'medicalstaff.empno'  , 'medicalstaff.med_actv' , 'departments.dept_nam','categories.catg_desc','specialities.spec_desc' ,'staffprivileges.id AS priv_id' ,'staffprivileges.privtyp_id'  ,'staffprivileges.templno','privtypes.type_desc' )->get();
          //dd($prv);
        $query =' select   s.staff_deci_id as staff_deci_id ,  s.staff_comment as staff_comment
                  , s.head_deci_id as head_deci_id ,  s.head_comment as head_comment
                  , s.committe_deci_id as committe_deci_id ,  s.committe_comment as committe_comment
                  ,  s.templno as  templno,  s.catgno as catgno,  s.templdetno as templdetno
                  ,  e.templdet_desc as templdet_desc,  e.group_desc as group_desc 
                  
                 
                  
                  
                  from  staffprivilegesdet as s,  templprivdet as e  
                   
                  where s.templno = e.templno and s.templdetno = e.templdetno
                  and  s.catgno = e.catgno 
                  and s.staffpriv_id = :id  and  s.templno = :tm  and  s.catgno =  :ct
                  order by e.group_desc  ';

        $temde = DB::select(  $query  , 
          ['id' =>  $prvid   , 'tm' =>  $rreq->templno  , 'ct' =>  $rreq->catgno  ]   );
 //dd ($temde); 
        $parm='H';
        $count = count($temde);
        $privdec = PrivDecisions::get();
        $PriV = PrivTypes::find(2);
      return view('Priviliges.commprivilege',[   'temp' => $temde,
                                                'StfPriv' => $rreq,
                                                'groups' => $groups,
                                                'category' => $cat,
                                                'c' => $count,
                                                'DecTyp'=> $privdec,
                                                'PriV' =>$PriV,
                                                'MedS'=>$prv, 
                                                'parm'=>$parm,
                                              ]);
    }

    

public function commUpdate(Request $e)
      {
 
        $tmpldet = StaffPrivilegesDet::where('staffpriv_id','=',$e->staffpriv_id )->get() ;
     //   dd( count($tmpldet) );
        for ($i=1; $i <=(count($tmpldet)) ; $i++) 
        { 
            $com_dec = $e['comm_deci_id'.$i];
            $com_com = $e['comm_comment'.$i];
   
        $ret =    DB::update('update staffprivilegesdet set committe_deci_id = :com_dec  
            , committe_comment  = :com_com  where staffpriv_id = :id  and templdetno = :det_no ', 
              [ 'id' => $e->staffpriv_id  , 'det_no' =>  $i   , 'com_dec' =>  $com_dec   , 'com_com' =>  $com_com   ]);
        }
      
            $updte = date('Y/m/d');
            $status = 'F';
            DB::update('update staffprivileges set committe_approv_dt = :updte  
            , priv_status  = :status  where id = :id   ', 
              [ 'id' => $e->staffpriv_id  ,  'updte' =>  $updte   , 'status' =>  $status   ]);

          return redirect('privilege/commlist');

    }







       public function PrivList(){
       /* $med = DB::table('medicalstaff') 
            ->leftJoin('departments', 'medicalstaff.depno', '=', 'departments.id')
            ->leftJoin('categories', 'medicalstaff.catgno', '=', 'categories.catgno')
            ->leftJoin('specialities', 'medicalstaff.specno', '=', 'specialities.specno')
             ->leftJoin('staffprivileges', 'medicalstaff.id', '=', 'staffprivileges.medstaff_id') 
            ->where('departments.head_userid', Auth::user()->id )
            ->select( 'medicalstaff.*', 'departments.dept_nam','categories.catg_desc','specialities.spec_desc'              ,'staffprivileges.head_approv_dt AS Edate' 
            )->get();*/
        $med = DB::table('medicalstaff') 
            ->leftJoin('departments', 'medicalstaff.depno', '=', 'departments.id')
            ->leftJoin('categories', 'medicalstaff.catgno', '=', 'categories.catgno')
            ->leftJoin('specialities', 'medicalstaff.specno', '=', 'specialities.specno')
             ->leftJoin('staffprivileges', 'medicalstaff.id', '=', 'staffprivileges.medstaff_id') 
            ->where('departments.head_userid', Auth::user()->id )
            ->select( 'medicalstaff.id', 'medicalstaff.full_name',    'medicalstaff.catgno',    'medicalstaff.specno' , 'medicalstaff.depno' ,   'medicalstaff.empno'  , 'medicalstaff.med_actv'
              , 'departments.dept_nam','categories.catg_desc','specialities.spec_desc'              ,'staffprivileges.head_approv_dt AS Edate' 
            )->get();

          //dd($med);
             $priv = PrivTypes::get();
            //dd($priv);
        	return view ("Priviliges.mystaff",['MedS'=> $med, 'PriV' => $priv,]);  
        
        }

        public function startPriv(Request $e){

        	       $e->validate( [  
        	             'privtyp_id' => 'required|integer',
        	            ]);
        	       
        	        $med=Medicalstaffs::where('id','=',$e->id )->first();
        //dd ($e);
        	        $tempID=TemplPrivMst::where('specno','=',$e->specno )->first();
        //	        dd($tempID);
        	        $id = DB::table('staffprivileges')->insertGetId([
        	            'templno' => $tempID->templno,
        	            'medstaff_id' => $e->id,
        	            'privtyp_id' => $e->privtyp_id,
        	            'created_at' => date('Y/m/d'),
        	        ]);

                return redirect('privilege/'.$id);
            }

   
    public function Priv(  $eid)
    {
        $e=StaffPrivileges::where('id','=',$eid )->first();
        //d($e);
        $med=Medicalstaffs::where('id','=',$e->medstaff_id )->first();
        $tempID=TemplPrivMst::where('specno','=',$med->specno )->first();
       //  dd ( $tempID );
        $groups=DB::table('templprivdet')->distinct()->where('templno',$tempID->templno)
        ->get(['group_desc']);
 //      dd($groups);
        $cat = DB::table('templprivdet')
        	 ->where('catgno',$med->catgno)
             ->select('catgno','group_desc', DB::raw('count(*) as count'))
             ->groupBy('catgno','group_desc')
             ->get();
// dd($cat);
        $temde = TemplPrivDet::where('templno',$tempID->templno)
        	->where('catgno',$med->catgno)
            ->orderBy('group_desc','asc')
            ->get();
//dd ($temde);
        $count = count($temde);
   //   dd ($temde);
        $privdec = PrivDecisions::get();
    	return view('Priviliges.privilege',[   'temp' => $temde,
                                              'priv' => $e,
                                              'groups' => $groups,
                                              'category' => $cat,
	                                          'c' => $count,
	                                          'MedS'=> $med,
	                                          'DecTyp'=> $privdec,
                                                ]);
    }


     public function savePriv(Request $e){
     	/*$e->validate( [
            'staff_score' => 'required|string|max:191',
            ]);*/
 //dd($e);

        for ($i=1; $i <=($e->count) ; $i++) { 
    		$tmpldet = new StaffPrivilegesDet();

    			$tmpldet->staffpriv_id = $e->staffpriv_id;
                $tmpldet->medstaff_id = $e->medstaff_id;
                $tmpldet->templno = $e->templno;
                // $tmpldet->templdetno = $e['templdetno'.$i];
                $tmpldet->templdetno = $e['templdetno'.$i];
                $tmpldet->specno = $e->specno;
                $tmpldet->catgno = $e->catgno;
                $tmpldet->staff_deci_id = $e['staff_deci_id'.$i];
                $tmpldet->staff_comment = $e['staff_comment'.$i];

               $ret = $tmpldet->save();
    	}
    	
	  	if (  $ret  )
            {
                $stfpriv = StaffPrivileges::find($tmpldet->staffpriv_id);
        //dd($dept);
                $stfpriv->specno = $e->specno;
                $stfpriv->catgno = $e->catgno;
                /*priv_status   S SUBMITTED   R REVIEWED   F FINALLIZED*/
                $stfpriv->priv_status = 'S';
                $stfpriv->save();
                return redirect('privilege/list');
            }
            
    	return redirect('privilege'.$e->staffpriv_id);
    }

 public function delPriv($mid){
        //dd($qid);
        StaffPrivileges::destroy($mid);
        return redirect('privilege/list');
    }


}

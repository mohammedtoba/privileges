<?php

namespace App\Http\Controllers;
use DB;
use Storage;
use App\Models\Medicalstaffs;
use App\Models\Nationalities;
use App\Models\Categories;
use App\Models\Departments;
use App\Models\Specialities;
use App\Models\Disciplines;
use App\Models\User;
use App\Models\Qualifications;
use App\Models\Qualificationtypes;
use App\Models\Staffevaluation;
use App\Models\Trainingcourses;
use App\Models\Experiences;
use App\Notifications\application;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class MedicalstaffCon extends Controller
{
    //Profile of a medical staff
    public function Profile(){
        $user_id = Auth::user()->id;
        $id = Auth::id();
        $med = DB::table('medicalstaff') 
          ->leftJoin('departments','medicalstaff.depno','=','departments.id')
          ->leftJoin('categories','medicalstaff.catgno','=','categories.catgno')
          ->leftJoin('jobtypes','medicalstaff.jobno','=','jobtypes.jobno')
          ->leftJoin('specialities','medicalstaff.specno','=','specialities.specno')
          ->leftJoin('nationalities','medicalstaff.natno','=','nationalities.natno')
          ->leftJoin('disciplines','medicalstaff.dispno','=','disciplines.dispno')
          ->where('medicalstaff.user_id', '=', $user_id )
          ->select( 'medicalstaff.*','departments.dept_nam','categories.catg_desc','specialities.spec_desc' ,'jobtypes.job_desc' ,'disciplines.disp_desc' ,'nationalities.nat_desc'    
          )->get(); 

        $educate = DB::table('qualifications')->where('medstaff_id','=',$med[0]->id )
            ->join('qualificationtypes', 'qualifications.qual_typ', '=', 'qualificationtypes.qual_typ')
            ->select('qualifications.*', 'qualificationtypes.qual_typ_desc')
            ->orderBy('qualif_year','desc')->get();

        $tracour = DB::table('trainingcourses')->where('medstaff_id','=', $med[0]->id )->select('trainingcourses.*')->get();

        $exper = DB::table('experiences')->where('medstaff_id','=',$med[0]->id )->select('experiences.*')->get();

        $directory =  'medicalstaffs/'.$user_id  ;
        $files = Storage::files($directory); 
        //dd ($directory ,  $files) ;
        return view ("medicalstaff.medstf_profile",[ 'MedS'=> $med,
                                                     'Educate' => $educate,
                                                     'Tracour' => $tracour,
                                                     'Exper'=> $exper,
                                                     'id'=>$id,
                                                     'Images'=> $files ,
                                                ]);  
        }

   //register a medical staff
   //get nationality from table
    public function GetNationality(){
        $p = Nationalities::get();
    
        return view ("privilegeProcess",['nat' => $p]); 
        }

    public function application(){
        $user_id = Auth::user()->id;
        $med = User::find($user_id)->Medicalstaff;
        //$med = Medicalstaffs::where('user_id','=',Auth::user()->id )->first();
        $p = Nationalities::get();
        $c = Categories::get();
        $d = Departments::get();
        $di = Disciplines::get();
        $sp = Specialities::get();
        $id = Auth::id();
        return view ("medicalstaff.apply",[   'nat' => $p,
                                                    'cat' => $c,
                                                    'dept'=> $d,
                                                    'disc'=> $di,
                                                    'spec'=> $sp,
                                                    'id'=>$id,
                                                    'MedS'=> $med,
                                                ]);  
        }

  

        public function saveMS(Request $doc)
    {
        
                
        $med = Medicalstaffs::where('user_id' ,'=',   Auth::user()->id )->first();
        $castm =  Medicalstaffs::find($med->id); 
        
        
            $castm->user_id = Auth::user()->id;
            $castm->first_name = $doc['first_name'];
            $castm->second_name = $doc['second_name'];
            $castm->third_name = $doc['third_name'];
            $castm->family_name = $doc['family_name'];
            $castm->full_name = $doc['first_name'].' '.$doc['second_name'].' '.$doc['third_name'].' '.$doc['family_name'];
            $castm->first_name_ar = $doc['first_name_ar'];
            $castm->second_name_ar = $doc['second_name_ar'];
            $castm->third_name_ar = $doc['third_name_ar'];
            $castm->family_name_ar = $doc['family_name_ar'];
            $castm->full_name_ar = $doc['first_name_ar'].' '.$doc['second_name_ar'].' '.$doc['third_name_ar'].' '.$doc['family_name_ar'];
            $castm->natno = $doc['natno'];
            $castm->catgno = $doc['catgno'];
            $castm->depno = $doc['depno'];
            $castm->jobno = $doc['jobno'];
            $castm->dispno = $doc['dispno'];
            $castm->empno = $doc['empno'];
            $castm->dob = $doc['dob'];
            $castm->dob = date('Y-m-d', strtotime($castm->dob));
            $castm->gender = $doc['gender'];
            $castm->phone = $doc['phone'];
            $castm->mobile = $doc['mobile'];
            $castm->address = $doc['address'];
            $castm->specno = $doc['specno'];
            $castm->licence_no = $doc['licence_no'];
            $castm->join_date = date('Y-m-d', strtotime($castm->join_date));
         
        $castm->save(); 
        $u=User::where('id',$castm->user_id )->first();
        //dd($u);
        if ($u->role_id) {}else{
            User::where('id',$castm->user_id)
          ->update(['role_id' => 4]); 
        }
                   
        return redirect('qual');    
    }
/*
    


/*
    
    Qualification controller
------------------------------------------------------------------------------------

*/
    Public function newQual(){
        $med = Medicalstaffs::where('user_id','=',Auth::user()->id )->first();
        $q = DB::table('qualifications')
            ->where('medstaff_id','=',$med->id )
            ->join('qualificationtypes', 'qualifications.qual_typ', '=', 'qualificationtypes.qual_typ')
            ->select('qualifications.*', 'qualificationtypes.qual_typ_desc')
            ->orderBy('qualif_year','desc')
            ->get();
        //dd($q);
        //$q = Qualifications::where('medstaff_id','=',$med->id )->get();
        $qedit = Qualifications::where('id','=',1)->first();
        $q_typ = Qualificationtypes::get();
        //array_multisort($q['qualif_year'], SORT_ASC, SORT_STRING);
        //asort($q,0);
        return view ("medicalstaff.qualification",['qual' => $q,
                                                    'qualedit' => $qedit,
                                                    'qtyp'=> $q_typ,
                                                    'MedS'=> $med,
                                                    ]);
    }
    public function eQual($qid){
            /*$query->where([
                ['medstaff_id', '=', $med->id],
                ['id', '=', $qid]
                ]);*/
            $med = Medicalstaffs::where('user_id','=',Auth::user()->id )->first();
            $q = Qualifications::where('medstaff_id','=',$med->id )->get();
            $qedit = Qualifications::where('id',$qid)->first();
            //dd($qedit);
            $q_typ = Qualificationtypes::get();
            return view ("medicalstaff.qualification",['qual' => $q,
                                                        'qualedit' => $qedit,
                                                        'qtyp'=> $q_typ,
                                                        'MedS'=> $med,
                                                        ]);
        }

    public function index() {
    $qual = Qualifications::sortable()->get();
    return View::make('qual.index', compact('qual'));
}
 public function saveQual(Request $request   )
    {
        
        //dd($request->hasFile('fileToUpload'));
        $directory = Storage::makeDirectory( 'medicalstaffs/'.$request->user_id );
        if ( $directory == true){
            dd($request);
          if ($request->hasFile('fileToUpload')) {
               /*$path=$request->fileToUpload->storeAs('medicalstaffs/'.$request->user_id , rand(10,10000).'.'.  $request->fileToUpload->extension()  );*/
                $path=$request->fileToUpload->storeAs('medicalstaffs/'.$request->user_id , 
                    $request->user_id.$request->id.$request->qual_typ.'.'.  $request->fileToUpload->extension()  );
            }
        }
        
         $cast = new Qualifications();
        //dd($request);
            $cast->medstaff_id =  $request->user_id;
            $cast->qualif_desc =  $request->qualif_desc;
            $cast->qual_typ =  $request->qual_typ;
            $cast->qualif_year = $request->qualif_year;
            $cast->qualif_univ = $request->qualif_univ;
            $cast->college = $request->college;
            $cast->clg_phone = $request->clg_phone;
            $cast->clg_email = $request->clg_email;
            $cast->clg_fax = $request->clg_fax;
            $cast->qualif_country = $request->qualif_country;
            if($request->hasFile('fileToUpload')){$cast->qualif_file_upload = $path;}
            $cast->qualif_notes = $request->qualif_notes;
        

       if ( $cast->save() == true ) {

           
                        
                        return redirect('qual');
                   } 
                   else{
                        return redirect()->back()->withAlert('Save failed');
                   }  
         
                  
            
        
    }
    public function editQual(Request $qu, $qid)
    {
        $qu->validate( [
            'qualif_desc' => 'required|string|max:191',
            'qual_typ' => 'required|string|max:191',
            'qualif_year' => 'required|integer|min:1950|max:2020',
            'qualif_univ' => 'required|string|max:191',
            'college'=>'required|string|max:191',
            'qualif_country' => 'required|string|max:191',
            'qualif_file_upload' => 'nullable|string|max:255',
            'qualif_notes' => 'nullable|string|max:255',

        ]);


       
       
       

        $cast =  Qualifications::find($qid);
        
            $cast->medstaff_id =  $qu->user_id;
            $cast->qualif_desc =  $qu->qualif_desc;
            $cast->qual_typ =  $qu->qual_typ;
            $cast->qualif_year = $qu->qualif_year;
            $cast->qualif_univ = $qu->qualif_univ;
            $cast->college = $qu->college;
            $cast->clg_phone = $qu->clg_phone;
            $cast->clg_email = $qu->clg_email;
            $cast->clg_fax = $qu->clg_fax;
            $cast->qualif_country = $qu->qualif_country;
            if($qu->hasFile('fileToUpload')){$cast->qualif_file_upload = $path;}
            $cast->qualif_notes = $qu->qualif_notes;
        

       if ( $cast->save() == true ) {

           
                        
                        return redirect('qual');
                   } 
                   else{
                        return "Save failed";
                   }    
    }
    public function delQual($qid){
        //dd($qid);
        Qualifications::destroy($qid);
        return redirect('qual');
    }

    public function test(){
        //dd($qid);
        //example for eager loading
        $med = Medicalstaffs::with('User','department','nationality','speciality','category','discipline')->get(); //dd($med);
        $staffEval = Staffevaluation::with('detail')->get();
        $med = Medicalstaffs::where('user_id','=',Auth::user()->id )->first();
        $user = User::find($med->user_id);
        //where('medstaff_id','=',$med->id )->get();
        //dd($staffEval);
        $user->notify(new \App\Notifications\application());
        /*$users = User::where('depno',5)->get();  //dd($users);
        Notification::send( $users, new \App\Notifications\allUsers('Hello','#'));*/
        $Notifications = $user->Notifications;
        //dd($Notifications); 
        $q_typ = Qualifications::paginate(5);
        return view('medicalstaff.test',['q'=> $q_typ,
                                         'Notification' => $Notifications,]);
    }

/*
   Training controller
------------------------------------------------------------------------------------
    */
    Public function Train()
        {
            $med = Medicalstaffs::where('user_id','=',Auth::user()->id )->first();
            $tracour = DB::table('trainingcourses')
                ->where('medstaff_id','=', $med->id )
                ->select('trainingcourses.*')
                ->get();
            //  dd($med);
              return view ("medicalstaff.training",['TraCour' => $tracour, 'MedS'=> $med, ]);
        }
    public function saveTrain( Request $Request   )
        {
            $Request->validate( [
                'train_desc' => 'required|string|max:191',
                'train_country' => 'required|string|max:191',
                'train_workplace' => 'required|string|max:191',
                'train_startdt'=>'required|date',
                'train_enddt'=>'required|date',
                'train_notes' => 'nullable|string|max:255',
                'train_file_upload' => 'nullable|string|max:255',
            ]);
            
            $count = Trainingcourses::where('medstaff_id','=', $Request->user_id  )->count();
            
            $directory = Storage::makeDirectory( 'medicalstaffs/'.$Request->user_id );
            if ( $directory == true)
            {
              if ( $Request->hasFile('fileToUpload')) 
                {
                    $img_id =  $count + 1; 
                    //dd ( $img_id   );
                    $path = $Request->fileToUpload->storeAs('medicalstaffs/'.$Request->user_id , 
                        $Request->user_id.'T'.$img_id.'.'.$Request->fileToUpload->extension()  );
                }
            }
             $cast = new Trainingcourses();
                $cast->medstaff_id =  $Request->user_id;
                $cast->train_desc =  $Request->train_desc;
                $cast->train_country =  $Request->train_country;
                $cast->train_workplace = $Request->train_workplace;
                $cast->train_startdt =  date('Y-m-d', strtotime($Request->train_startdt ));
                $cast->train_enddt =  date('Y-m-d', strtotime($Request->train_enddt ));
                $cast->train_phone = $Request->train_phone;
                $cast->train_email = $Request->train_email;
                $cast->train_fax = $Request->train_fax;
     
                if(   !empty($path) ){$cast->train_file_upload = $path;}
                //dd( $cast->train_file_upload );
                $cast->train_notes = $Request->train_notes;
            

           if ( $cast->save() == true ) 
           {
                return redirect('train');
           } 
           else
           {
                return "Save failed";
           }  
        }
    public function editTrain(Request $Request, $train_id)
        {
             $Request->validate( [
                'train_desc' => 'required|string|max:191',
                'train_country' => 'required|string|max:191',
                'train_workplace' => 'required|string|max:191',
                'train_startdt'=>'required|date',
                'train_enddt'=>'required|date',
                'train_notes' => 'nullable|string|max:255',
                'train_file_upload' => 'nullable|string|max:255',
            ]);

            $count = Trainingcourses::where('medstaff_id','=', $Request->user_id )->count();
     
            $cast =  Trainingcourses::find($train_id);

                $cast->medstaff_id =  $Request->user_id;
                $cast->train_desc =  $Request->train_desc;
                $cast->train_country =  $Request->train_country;
                $cast->train_workplace = $Request->train_workplace;
                $cast->train_startdt =  date('Y-m-d', strtotime($Request->train_startdt ));
                $cast->train_enddt =  date('Y-m-d', strtotime($Request->train_enddt ));
                $cast->train_phone = $Request->train_phone;
                $cast->train_email = $Request->train_email;
                $cast->train_fax = $Request->train_fax;
                $cast->train_notes = $Request->train_notes;

                if ( $Request->hasFile('fileToUpload')) 
                {
                   // dd ( Trainingcourses::find($train_id)->train_file_upload );
                    Storage::delete( Trainingcourses::find($train_id)->train_file_upload );
                    $img_id =  $count + 1  ; 
                   //  dd ( $img_id   );
                    $path = $Request->fileToUpload->storeAs('medicalstaffs/'.$Request->user_id , 
                        $Request->user_id.'T'.$img_id.'.'.$Request->fileToUpload->extension()  );
                }

                if(   !empty($path) ){$cast->train_file_upload = $path;}
                //dd( $cast->train_file_upload );
            
                if ( $cast->save() == true ) 
                {
                    return redirect('train');
                } 
                else
                {
                    return "Save failed";
                }    


        }
    public function delTrain($train_id)
        {
            Storage::delete( Trainingcourses::find($train_id)->train_file_upload );
            Trainingcourses::destroy($train_id);
            return redirect('train');
        }
    /*
       Experiences controller
    ------------------------------------------------------------------------------------
    */
     
    Public function Exper()
        {
             $med = Medicalstaffs::where('user_id','=',Auth::user()->id )->first();
            $expercour = DB::table('experiences')
                ->where('medstaff_id','=',$med->id )
                ->select('experiences.*')
                ->get();
            //  dd($med);
             return view ("medicalstaff.experiences",['ExperCour' => $expercour, 'MedS'=> $med, ]);
        }

    public function saveExper( Request $Request   )
        {
            $Request->validate( [
                'exper_position' => 'required|string|max:191',
                'exper_country' => 'required|string|max:191',
                'exper_workplace' => 'required|string|max:191',
                'exper_startdt'=>'required|date',
                'exper_enddt'=>'required|date',
                'exper_notes' => 'nullable|string|max:255',
                'exper_file_upload' => 'nullable|string|max:255',
            ]);
            
            $count = Experiences::where('medstaff_id','=', $Request->user_id  )->count();
            
            $directory = Storage::makeDirectory( 'medicalstaffs/'.$Request->user_id );
                
            if ( $directory == true)
            {
                
                    $img_id =  $count + 1; 
                    //dd ( $img_id   );
                    $path = $Request->fileToUpload->storeAs('medicalstaffs/'
                        .$Request->user_id ,$Request->user_id.'E'.$img_id.'.'.$Request->fileToUpload->extension()  );
                 //dd( $Request->hasFile() );
              if ( $Request->hasFile('fileToUpload')) 
                {
                    /*$img_id =  $count + 1; 
                    //dd ( $img_id   );
                    $path = $Request->fileToUpload->storeAs('medicalstaffs/'.$Request->user_id , 
                        $Request->user_id.'E'.$img_id.'.'.$Request->fileToUpload->extension()  );*/
                }
            }

             $cast = new Experiences();
                $cast->medstaff_id =  $Request->user_id;
                $cast->exper_position =  $Request->exper_position;
                $cast->exper_country =  $Request->exper_country;
                $cast->exper_workplace = $Request->exper_workplace;
                $cast->exper_startdt =  date('Y-m-d', strtotime($Request->exper_startdt ));
                $cast->exper_enddt =  date('Y-m-d', strtotime($Request->exper_enddt ));
                $cast->exper_phone = $Request->exper_phone;
                $cast->exper_email = $Request->exper_email;
                $cast->exper_fax = $Request->exper_fax;
     
                if(   !empty($path) ){$cast->exper_file_upload = $path;}
                //dd( $cast->exper_file_upload );
                $cast->exper_notes = $Request->exper_notes;
           //dd( $cast ); 

           if ( $cast->save() == true ) 
           {
                return redirect('exper');
           } 
           else
           {
                return "Save failed";
           }  
        }
    public function editExper(Request $Request, $exper_id)
        {
             $Request->validate( [
                'exper_position' => 'required|string|max:191',
                'exper_country' => 'required|string|max:191',
                'exper_workplace' => 'required|string|max:191',
                'exper_startdt'=>'required|date',
                'exper_enddt'=>'required|date',
                'exper_notes' => 'nullable|string|max:255',
                'exper_file_upload' => 'nullable|string|max:255',
            ]);

            $count = Experiences::where('medstaff_id','=', $Request->user_id )->count();
     
            $cast =  Experiences::find($exper_id);

                $cast->medstaff_id =  $Request->user_id;
                $cast->exper_position =  $Request->exper_position;
                $cast->exper_country =  $Request->exper_country;
                $cast->exper_workplace = $Request->exper_workplace;
                $cast->exper_startdt =  date('Y-m-d', strtotime($Request->exper_startdt ));
                $cast->exper_enddt =  date('Y-m-d', strtotime($Request->exper_enddt ));
                $cast->exper_phone = $Request->exper_phone;
                $cast->exper_email = $Request->exper_email;
                $cast->exper_fax = $Request->exper_fax;
                $cast->exper_notes = $Request->exper_notes;

                if ( $Request->hasFile('fileToUpload')) 
                {
                     Storage::delete( Experiences::find($exper_id)->exper_file_upload );
                    $img_id =  $count + 1  ; 
                   //  dd ( $img_id   );
                    $path = $Request->fileToUpload->storeAs('medicalstaffs/'.$Request->user_id , 
                        $Request->user_id.'E'.$img_id.'.'.$Request->fileToUpload->extension()  );
                }

                if(   !empty($path) ){$cast->exper_file_upload = $path;}
                //dd( $cast->exper_file_upload );
            
                if ( $cast->save() == true ) 
                {
                    return redirect('exper');
                } 
                else
                {
                    return "Save failed";
                }    

        }
    public function delExper($exper_id)
        {
            Storage::delete( Experiences::find($exper_id)->exper_file_upload );
            Experiences::destroy($exper_id);
            return redirect('exper');
        }




    }




    








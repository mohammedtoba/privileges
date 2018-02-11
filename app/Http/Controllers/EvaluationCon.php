<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Storage;
use Carbon\Carbon;
use App\Models\Staffevaluation;
use App\Models\Staffevaluationdet;
use App\Models\Medicalstaffs;
use App\Models\Categories;
use App\Models\User;
use App\Models\Departments;
use App\Models\Disciplines;
use App\Models\Templcatglink;
use App\Models\Templevaludet;
use App\Models\Templevalumst;
use Illuminate\Support\Facades\Auth;






class EvaluationCon extends Controller
{
/*        
        Medical Staff list
------------------------------------------------------------------------------------

*/
    
    public function evalList(){
        /*$med = DB::table('medicalstaff')
            ->leftJoin('nationalities', 'medicalstaff.natno', '=', 'nationalities.natno')
            ->leftJoin('departments', 'medicalstaff.depno', '=', 'departments.id')
            ->leftJoin('categories', 'medicalstaff.catgno', '=', 'categories.catgno')
            ->leftJoin('specialities', 'medicalstaff.specno', '=', 'specialities.specno')
            ->leftJoin('staffevaluation', 'medicalstaff.id', '=', 'staffevaluation.medstaff_id')
            ->where('departments.head_userid',Auth::user()->id)
            ->select('medicalstaff.*', 'nationalities.nat_desc','departments.dept_nam','categories.catg_desc','specialities.spec_desc','staffevaluation.head_sign_dat AS Edate','staffevaluation.staff_score' )
            ->orderBy('Edate')
            ->get();*/
        $depID = Departments::where('head_userid',(Auth::user()->id) )->pluck('id')->all();
        $medID = Medicalstaffs::where('depno',$depID)->pluck('id')->all();
        //dd($medID);
        $medicalStaff = Medicalstaffs::with('lastEval','department','nationality','category')
            ->whereIn('id',$medID)
            ->get(); //dd($medicalStaff);
        /*//list for all valutions for a department
        $department = Departments::with('staffForEvaluation')->where('id',5)->get();
        dd($department);*/ 
        return view ("Evaluation.msList",['MedS'=> $medicalStaff]);  
        }
    public function evalHistory(){
        $depID = Departments::where('head_userid',(Auth::user()->id) )->pluck('id')->all();
        $medID = Medicalstaffs::where('depno',$depID)->pluck('id')->all();
        //dd($medID);
        $dept = Departments::where('head_userid',(Auth::user()->id) )->get();
        $medicalStaff = Medicalstaffs::with('evaluation','department','nationality','category')
            ->whereIn('id',$medID)
            ->get(); //dd($medicalStaff);
        $eval =  Staffevaluation::whereIn('medstaff_id',$medID)->get();
        $templ = Staffevaluationdet::with('detailsItem')->where('eval_id',17)->get();


        dd($templ);
        return view ("Evaluation.evalHistoryList",['MedS'=> $medicalStaff, 'dept'=> $dept]);  
        }


    public function startEval(Request $e){
        $e->validate( [
            'eval_typ' => 'required|string|max:191',
            ]);
        $med=Medicalstaffs::where('id','=',$e->id )->first();
        $tempID=Templcatglink::where('catgno','=',$med->catgno )->first();
        $id = DB::table('staffevaluation')->insertGetId([
            'templno' => $tempID->templno,
            'medstaff_id' => $e->id,
            'eval_typ' => $e->eval_typ,
            'created_at' => Carbon::now(),

        ]);

        return redirect('evaluate/'.$id);
   }

    public function Eval($eid){
        $e=Staffevaluation::where('id','=',$eid )->orderBy('created_at')->first();
        //dd($e->recomnd_goals);
        $med = DB::table('medicalstaff')
            ->leftJoin('nationalities', 'medicalstaff.natno', '=', 'nationalities.natno')
            ->leftJoin('departments', 'medicalstaff.depno', '=', 'departments.id')
            ->leftJoin('categories', 'medicalstaff.catgno', '=', 'categories.catgno')
            ->leftJoin('specialities', 'medicalstaff.specno', '=', 'specialities.specno')
            ->leftJoin('staffevaluation', 'medicalstaff.id', '=', 'staffevaluation.medstaff_id')
            ->where('departments.head_userid',Auth::user()->id)
            ->where('medicalstaff.id','=',$e->medstaff_id )
            ->select('medicalstaff.*', 'nationalities.nat_desc','departments.dept_nam','categories.catg_desc','specialities.spec_desc','staffevaluation.head_sign_dat AS Edate' )
            ->get();
            //dd($med[0]->catgno);
        //to get the details of the template and the previous score from evaluation if it is there
        $tempID=Templcatglink::where('catgno','=',$med[0]->catgno )->first();
        //to get the scopes twith the score from evaluaiton table if it is there
        $score = DB::table('Staffevaluationdet')
                     ->where('eval_id', $eid)
                     ->leftJoin('templevaludet', 'Staffevaluationdet.templdetno', '=', 'templevaludet.templdetno')
                     ->select('templevaludet.scope', DB::raw('avg((staff_score/max_score)) as average'))
                     ->groupBy('templevaludet.scope')
                     ->get();
        
        if ($e->staff_score) {
        $temde =DB::table('Staffevaluationdet')
            ->leftJoin('templevaludet','Staffevaluationdet.templdetno' ,'=','templevaludet.templdetno')
            ->where('Staffevaluationdet.eval_id',$eid)
            ->select('templevaludet.*','Staffevaluationdet.staff_score')
            ->orderBy('scope','asc')
            ->orderBy('category','asc')
            ->get();   
        }else{
            $temde =DB::table('templevaludet')
            ->orderBy('scope','asc')
            ->orderBy('category','asc')
            ->get();
        }
        $sco=DB::table('templevaludet')->distinct()->where('templno',$tempID->templno)->get(['scope']);
        $cat = DB::table('templevaludet')
            ->where('templevaludet.templno',$tempID->templno)
            ->select('scope','category', DB::raw('count(*) as count'))
            ->groupBy('scope','category')
            ->get();
        $count = count($temde);
        $sum=0;
        foreach($score as $num => $values) {
            $sum += $values->average;
        }
        if ($sum) {
            $finalScore=$sum/count($score);
        } else{$finalScore =false;}
        $x=0;
    	return view('Evaluation.evaluate',[   'temp' => $temde,
                                              'eval' => $e,
                                              'scope' => $sco,
                                              'category' => $cat,
	                                          'c' => $count,
	                                          'MedS'=> $med,
                                              'variable'=>$x,
                                              'score'=>$score,
                                              'final_score'=>$finalScore,
                                                ]);
    }

     public function saveEval(Request $e){
    	$e->validate( [
            'recomnd_oppor' => 'required|string|max:191',
            'recomnd_goals' => 'required|string|max:191',
            ]);
        for ($i=1; $i <=($e->count) ; $i++) { 
            
            $tmpldet = Staffevaluationdet::updateOrCreate(
                ['templdetno' => $e['templdetno'.$i],
                'templno' => $e['templno'],
                'medstaff_id' => $e['medstaff_id'],
                'eval_id' => $e['eval_id'],
                ],
                [
                'staff_score' => $e['staff_score'.$i],
                'max_score' => $e['templdet_score'.$i],
                'comments' => $e['comments'.$i],
                ]);
    	}
        
    	$score = DB::table('Staffevaluationdet')
                     ->where('eval_id', $e['eval_id'])
                     ->leftJoin('templevaludet', 'Staffevaluationdet.templdetno', '=', 'templevaludet.templdetno')
                     ->select('templevaludet.scope', DB::raw('avg((staff_score/max_score)) as average'))
                     ->groupBy('templevaludet.scope')
                     ->get();
        $sum=0;
        foreach($score as $num => $values) {
            $sum += $values->average;
        }
        $finalScore=$sum/count($score);
        if($finalScore>=0.85){$grade='Excellent';
        }elseif(($finalScore<0.85) && ($finalScore>=0.7)){$grade='Very Good';
        }elseif(($finalScore<0.7) && ($finalScore>=0.5)){$grade='Good';
        }elseif($finalScore<0.5){$grade='Poor';}
        //dd($grade);
        
        $eval = Staffevaluation::updateOrCreate(
        [
        'id' => $e['eval_id'],
        'templno' => $e['templno'],
        'medstaff_id' => $e['medstaff_id'],
        ],
        [
        'recomnd_oppor' => $e['recomnd_oppor'],
        'recomnd_goals' => $e['recomnd_goals'],
        'head_comment' => $e['head_comment'],
        'staff_score' => $finalScore,
        'eval_grade' => $grade,
        ]);

        
            
    	return redirect()->back();
    }

    public function finalizeEval($eid){
        
        $eval = Staffevaluation::find($eid);
        //dd($eval);
                $eval->head_sign = Auth::user()->id;
                $eval->head_sign_dat = Carbon::now();

                $eval->save();
                return redirect('evaluate/list');
    }

    public function delEval($eid){
            //dd($qid);
            /*$eval = Staffevaluation::find($eid)
            if($eval->status)*/
            Staffevaluation::find($eid)->detail()->delete();
            Staffevaluation::destroy($eid);
            return redirect('evaluate/list');
        }
//not used yet        
    public function updateEval(Request $request, $mid){
    	//dd($mid);
    	//Departments::where('depno', $id)->update(array('head_userid' => $dep));
    	$dept = Templevaludet::find($mid);
    	//dd($dept);
		$dept->head_userid = $request->head_userid;
		$dept->parent_depno = $request->parent_depno;

		$dept->save();
    	return redirect('department');
    }

    public function otherEval($eid, $a){
    	//
    }

    
}

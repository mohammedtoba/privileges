<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Templevalumst;
use App\Models\Templevaludet;
use App\Models\Templprivmst;
use App\Models\Templprivdet;
use App\Models\Departments;
use App\Models\Specialities;
use App\Models\Templ_Groups;
use App\Models\Categories;

class TemplateCon extends Controller
{  
    public function privTemplate() 
    {
        $spec = Specialities::get();
        $templates  = TemplPrivMst::get();
        $templgroups  = Templ_Groups::get();
        $depts  = Departments::get();
        $catg  = Categories::get();
        return view('ControlPanels.PrivTemplate',[ 'Specs' => $spec,
                                                   'templates'=>$templates,
                                                'templgroups'=>$templgroups,
                                                 'depts'=>$depts,
                                                 'catg'=>$catg,
                                                ]);
    }
    public function saveTmplPriv(Request $request){
        $request->validate( [
            'templno' => 'required|string|max:10',
            'templ_desc' => 'required|string|max:191',
            'templ_desc_ar' => 'nullable|string|max:191',
            'specno' => 'required|string|max:191',
            ]);
        $tmplmst = new TemplPrivMst();
        $tmplmst->templno = $request->templno;
        $tmplmst->templ_desc = $request->templ_desc;
        $tmplmst->specno = $request->specno;
        $tmplmst->templ_desc_ar = $request->templ_desc_ar;
        $tmplmst->templ_actv = $request->templ_actv;
        $tmplmst->prepared_by = Auth::user()->id ;
        $tmplmst->save();
        return redirect('privilegetemplate');
    }
    public function editTmplPriv(Request $request, $did){
        //dd($request);
        //$tmplmst = TemplPrivMst::find($did);
        $tmplmst = TemplPrivMst::where('templno',$did )->first();
       // dd($request);
        $tmplmst->specno = $request->specno;
        $tmplmst->templ_desc_ar = $request->templ_desc_ar;
        $tmplmst->approved_by = Auth::user()->id ;
      //  dd($tmplmst);
        $tmplmst->save();
        return redirect('privilegetemplate');
    }
    public function activeTmplPriv($did, $a){
        if ($a == 'Y') {$a='N';} elseif ($a=='N') {$a='Y';}
        //dd($a);
        //$tmplmst = TemplPrivMst::find($did);
        $tmplmst = TemplPrivMst::where('templno',$did )->first();
        //dd($dept);
        $tmplmst->templ_actv = $a;
        $tmplmst->save();
        return redirect('privilegetemplate');
    }
    public function delTmplPriv($did){
        //dd($qid);
        TemplPrivMst::destroy($did);
        return redirect('privilegetemplate');
    }
    public function saveTmplPrivG(Request $request){
        dd($request );
        $tmplgrp = new Templ_Groups();
        $tmplgrp->templno = $request->templno;
        $tmplgrp->grp_desc = $request->grp_desc;
        $tmplgrp->specno = $request->specno;
        $tmplgrp->grp_desc_ar = $request->grp_desc_ar;
        $tmplgrp->grp_cod = $request->grp_cod;
        $tmplgrp->prepared_by = Auth::user()->id ;
        $tmplgrp->save();
        return redirect('privilegetemplate');
    }
    public function editTmplPrivG(Request $request){
        dd($request );
    }
    public function activeTmplPrivG(Request $request){
        dd($request );
    }
    public function delTmplPrivG(Request $request){
        dd($request );
    }
    public function saveTmplPrivGD(Request $request){
        dd($request );
    }
    public function editTmplPrivGD(Request $request){
        dd($request );
    }
    public function activeTmplPrivGD(Request $request){
        dd($request );
    }
    public function delTmplPrivGD(Request $request){
        dd($request );
    }
    public function saveTP(Request $doc) {
       $doc->validate( [
            'templno' => 'required|string|max:10',
            'templ_desc' => 'required|string|max:191',
            'templ_desc_ar' => 'required|string|max:191',
            'specno' => 'required|string',
        ]);
        $tmpl = new TemplPrivMst();
        $tmpl->templno = $doc['templno'];
        $tmpl->templ_desc = $doc['templ_desc'];
        $tmpl->templ_desc_ar = $doc['templ_desc_ar'];
        $tmpl->specno = $doc['specno'];
        if ( $tmpl->save() == true ) 
        {
            for($counter = 1;$counter<= 5 ; $counter++)
            {  
                $tmpldet = new TemplPrivDet();
                $tmpldet->templno = $tmpl->templno;
               // dd($doc['templdetno'.$counter]);
               // $tmpldet->templdetno = $doc['templdetno'.$counter];
                $tmpldet->templdet_desc = $doc['templdet_desc'.$counter];
                $tmpldet->templdet_desc_ar = $doc['templdet_desc_ar'.$counter];
                $tmpldet->catgno = $doc['catgno'.$counter];
                $tmpldet->group_desc = $doc['group_desc'.$counter];
                $tmpldet->proced_code = $doc['proced_code'.$counter];
                $tmpldet->proced_desc = $doc['proced_desc'.$counter];
                $tmpldet->templdet_score = $doc['templdet_score'.$counter];
                $tmpldet->templdet_actv = $doc['templdet_actv'.$counter];
               $ret = $tmpldet->save();
            }
            if (  $ret == true )
            {
                return "Save DONE ..... " ;
            }
        }
        else 
        {
            return "Save failed";
        }  
    }
    public function evalTemplate() {
        return view('ControlPanels.EvalTemplate');
    }
    public function saveTT(Request $doc) {
        $tmpl = new Templevalumst();
        $tmpl->templno = $doc['templno'];
        $tmpl->templ_desc = $doc['templ_desc'];
        $tmpl->templ_desc_ar = $doc['templ_desc_ar'];
        $tmpl->templ_score = $doc['templ_score'];
        $tmpl->templ_actv = $doc['templ_actv'];
        if ( $tmpl->save() == true ) 
        {
            for($counter = 1;$counter<= 5 ; $counter++)
            {  
                $tmpldet = new Templevaludet();
                $tmpldet->templno = $tmpl->templno;
               // dd($doc['templdetno'.$counter]);
               // $tmpldet->templdetno = $doc['templdetno'.$counter];
                $tmpldet->templdet_desc = $doc['templdet_desc'.$counter];
                $tmpldet->templdet_desc_ar = $doc['templdet_desc_ar'.$counter];
                $tmpldet->scope = $doc['scope'.$counter];
                $tmpldet->category = $doc['category'.$counter];
                $tmpldet->templdet_score = $doc['templdet_score'.$counter];
                $tmpldet->templdet_actv = $doc['templdet_actv'.$counter];
               $ret = $tmpldet->save();
            }
            if (  $ret == true )
            {
                return "Save DONE ..... " ;
            }
        }
        else 
        {
            return "Save failed";
        }  
    }
}
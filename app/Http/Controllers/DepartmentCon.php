<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Nationalities;
use App\Models\Categories;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;

 
class DepartmentCon extends Controller
{
    public function Dept(){
    	$dep = Departments::get();
    	$users = User::where('usrtype','=','M' )->where('usractv','Y')->get();
    	$depD = DB::table('departments')
            		//->where('head_userid','=',$med->id )
                    ->leftJoin('users', 'departments.head_userid', '=', 'users.id')
            		->leftJoin('Departments as parents', 'departments.parent_depno', '=', 'parents.id')
                    ->select('departments.*', 'users.name','parents.dept_nam as parent')
            		//->paginate(10);
            		->get();
		//dd($depD);
        $departments = Departments::where('parent_depno', '=', 0)->where('dept_actv','Y')->get();
        $allDepartments = Departments::pluck('dept_nam','id')->all();
        return view('ControlPanels.department',[   'depts' => $dep,
                                                   'user' => $users,
                                                   'deptDetail'=>$depD,
                                                   'departments'=>$departments,
                                                   'allDepartments'=>$allDepartments,
                                                ]);
    }

    
     public function saveDept(Request $request){
    	
    	$request->validate( [
            'dept_nam' => 'required|string|max:191',
            ]);

    	$dept = new Departments();
		$dept->dept_nam = $request->dept_nam;
    	$dept->head_userid = $request->head_userid;
		$dept->parent_depno = $request->parent_depno;

		$dept->save();
        
        User::where('id',$dept->head_userid)
          ->update(['role_id' => 3]);
    	return redirect('department');
    }

    public function editDept(Request $request, $did){
    	//dd($did);
    	//Departments::where('depno', $id)->update(array('head_userid' => $dep));
    	$dept = Departments::find($did);
    	//dd($dept);
		$dept->head_userid = $request->head_userid;
		$dept->parent_depno = $request->parent_depno;

		$dept->save();

        User::where('id',$dept->head_userid)
          ->update(['role_id' => 3]);
    	return redirect('department');
    }

    public function activeDept($did, $a){
    	//dd($did);
    	//Departments::where('depno', $id)->update(array('head_userid' => $dep));
    	if ($a == 'Y') {$a='N';} elseif ($a=='N') {$a='Y';}
    	//dd($a);
    	$dept = Departments::find($did);
    	//dd($dept);
		$dept->dept_actv = $a;
		
		$dept->save();
    	return redirect('department');
    }

    public function delDept($did){
        //dd($qid);
        Departments::destroy($did);
        return redirect('department');
    }
}

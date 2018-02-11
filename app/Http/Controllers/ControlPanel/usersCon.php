<?php

namespace App\Http\Controllers\ControlPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Departments;
//use App\Models\Role;

class usersCon extends Controller
{
    public function view(){
    	//dd(date('Y'));
        $users = user::with('Role','Medicalstaff','Department')->get(); //dd($users);
        //dd($users[0]->role);
			return view ("ControlPanels.users",[   'users' => $users ]);  
    }

    public function addUsers($uid = 0){
        //dd(date('Y'));
        $users = user::with('Role','Medicalstaff','Department')->find($uid); //dd($users);
        $dept = Departments::where('dept_actv','Y')->get();
        //dd($users[0]->role);
            return view ("ControlPanels.addUser",[   'users' => $users,'dept'=> $dept ]);  
    }
    
    protected function updateOrCreateUser(Request $Request)
    {
        $user = User::updateOrCreate(
            [
            'empno' => $Request['empno'],
            ],[
            'name' => $Request['name'],
            'name_ar' => $Request['name_ar'],
            'email' => $Request['email'],
            'usrtype' => $Request['usrtype'],
            'depno' => $Request['depno'],
            'usractv' => 'Y',
            'password' => bcrypt($Request['password']),
            ]
        );

        //dd($user);
        if ( $Request['usrtype']== 'M') {
                $user->MedicalStaff()->updateOrCreate([                          
                    'user_id' => $user->id,],
                    [
                    'first_name' => $Request['name'],
                    'family_name' => $Request['name_ar'],
                    'empno' => $Request['empno'],                          
                    'depno' => $Request['depno'],
                    'med_actv' => 'I',
                ]);}
            return redirect('controlPanel/users/view');
        }

    public function activeUser($uid, $a){
    	//dd($uid);
    	//Departments::where('depno', $id)->update(array('head_userid' => $dep));
    	$dept = User::find($uid);
    	//dd($dept);
		$dept->usractv = $a;
		
		$dept->save();
    	return redirect()->back();
    }

}

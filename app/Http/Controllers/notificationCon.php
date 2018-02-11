<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notificationCon extends Controller
{
    public function show(){

    $med = Medicalstaffs::where('user_id','=',Auth::user()->id )->first();
        $user = User::find($med->user_id);
        //where('medstaff_id','=',$med->id )->get();
        //dd($med);
        //$user->notify(new \App\Notifications\application());
        /*$users = User::get();
        Notification::send($users, new \App\Notifications\allUsers('Welcome '.$med->fullName));*/
        $Notif = $user->Notifications;
        //dd($Notifications);
        
        return $Notif;
    }
}

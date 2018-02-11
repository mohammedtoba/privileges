<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
     public function MarkAsRead (Request $request)
        {
			$parm = DatabaseNotification::find($request->notif_id);
			dd($parm);
			$id = auth()->user()->unreadNotifications[0]->id;
			auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        }

}

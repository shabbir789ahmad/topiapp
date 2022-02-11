<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\Notification;
use App\Models\Modal;
use App\Http\Traits\ImageTrait;
class NotificationController extends Controller
{
   use ImageTrait;
   public function sendNotification2(Request $request)
    {
   
        $token = Token::whereNotNull('token')->pluck('token')->all();
     
        $server_key = 'AAAAM0JIwi0:APA91bE4RuYz2qpkEsADHLkJySgEN28L8e5ORkVb3NHLXLuTF8A5sJ48qL1YaFzrLOToBik-iJ8mKP1CvIHLr55ZQAZgOxWRnCZloxZwj3Z_uPqJ-SxQ8WCU5YcOk69E1VT7w_kHS9rO';
           $color=implode(",",$this->color());
        Notification::create([
        'modal_id'=>$request->modal_id,
        'message'=>$request->message,
        'color'=>$color,
        ]);
        
        $data = [
            "registration_ids" => $token,
            "notification" => [
                "title" => $request->title,
                "body" => $request->message,
                "content_available" => true,
                "priority" => "low",
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $server_key,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        return redirect()->back()->with('success','Video Approved And Notification send');
    }
    
    function notification(Request $req)
    {
      $notification=Modal::join('notifications','modals.id','=','notifications.modal_id')
       ->select('modals.video_name','notifications.modal_id','notifications.message','modals.premium','notifications.created_at','notifications.color')->get();
      return response()->json($notification);
    }
   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\Modal;
use Log;
use DB;
class TokenController extends Controller
{
    function token(Request $req)
    {
     
     
       
      $validator = \Validator::make($req->all(), [
        
         'token'=>'required',
         'imei'=>'required',
       ]);

        if ($validator->fails()) {

            return response()->json([
     
        "message" => "token And Imei should be unique "
       
         ], 409);

        }
       $token=Token::where('imei',$req->imei)->first();
       if($token)
       {
          Token::where('imei',$req->imei)->update(['token'=>$req->token]);
           return response()->json([
     
        "message" => "Token Uploaded"
       
         ], 201);
       }else{
       
      Token::create([
      
      'token'=>$req->token,
       'imei'=>$req->imei,
      ]);
      
     
      return response()->json([
     
        "message" => "Token Uploaded"
       
         ], 201);
       }
     
      
      
      
    }
    
    
    function AdminVideos()
    {
      $adminvideo=Modal::join('communities','modals.id','=','communities.modal_id')
      ->select('modals.video_name','communities.modal_id','communities.video','modals.premium')->orderBy(DB::raw('RAND()'))->get();
      
      return response()->json($adminvideo);
    }
    
    
}

<?php
namespace App\Http\Traits;
trait ImageTrait{

  function getimage()
  { 
     
  	 $req=app('request');
      
  	if($req->hasfile('image'))
      {
      $file=$req->file('image');
       $ext=$file->getClientOriginalExtension();
       $filename=time(). '.' .$ext;
       $fi=$file->move('uploads/img/', $filename);

        $image='http://59.103.234.58:8005/uploads/img/'.$filename;
     
      }

    return $image;
  }

 function getProfile()
  { 
     
  	 $req=app('request');
      
  	if($req->hasfile('profile'))
      {
      $file=$req->file('profile');
       $ext=$file->getClientOriginalExtension();
       $filename=time(). '.' .$ext;
      $file->move('uploads/img/', $filename);
       $filen='http://59.103.234.58:8005/uploads/img/'.$filename; 
     
      }

    return $filen;
  }


  function getVideo()
  { 
     
     $req=app('request');
      
    if($req->hasfile('video'))
    {
      $file=$req->file('video');
       $ext=$file->getClientOriginalExtension();
       $filename=time(). '.' .$ext;
       $file->move('/var/www/topi/static/img/', $filename);
        
       $video='http://59.103.234.58:8002/static/img/'.$filename; 
     
    }

    return $video;
  }

  function getAudio()
  { 
     
     $req=app('request');
      
    if($req->hasfile('audio'))
    {
      $file=$req->file('audio');
       $ext=$file->getClientOriginalExtension();
       $filename=time(). '.' .$ext;
       $file->move('/var/www/topi/static/img/', $filename);
     $audio='http://59.103.234.58:8002/static/img/'.$filename; 
       
     
    }

    return $audio;
  }
 
 
  function color()
    {
    
              $colors=[['#D16BA5','#86A8E7','#5FFBF1'],['#972064','#163369','#5FFB65'],['#510955','#18DA5B','#18100C'],['#49D118','#263ABB','#A60D3C'],['#9B1378','#0B7233','#670926'],['#671329','#26C22C','#600000'],['#5A27EC','#26C22C','#600000'],['#AA2C9A','#3DE343','#BFE507'],['#141071','#3DE343','#455107'],['#697110','#3D7EE3','#87130E'],['#2A0503','#084E2C','#440906'],['#8C1587','#1F945C','#7D18A8'],['#158C3E','#7F0F27','#1857A8'],['#62158C','#7F0F27','#8FA818'],['#E396A7','#440C18','#204F81']];
       
        
         $colo=array_rand($colors);
         $color=$colors[$colo];
       
        return $color;
    } 
 
 }

?>

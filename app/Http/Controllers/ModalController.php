<?php

namespace App\Http\Controllers;
use App\Models\Modal;
use App\Models\Category;
use App\Models\Video;
use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Traits\ImageTrait;
use Auth;
use Response;
use DB;
use Illuminate\Support\Facades\File;
class ModalController extends Controller
{
    use ImageTrait;
    public function index(Request $req)
    {
       $category='';
       $free='';
       if($req->category !== null)
       {
         $category=$req->category;
       }
       
       
       if($req->free !== null)
       {
         $free=$req->free;
       }
       
        $query=Modal::latest();
          if($category)
          {
           $query=$query->where('category_id',$category);
          }
        
         
          if($free)
          {
           $query=$query->where('premium',$free);
          }
         $modals= $query->get();
   
         $categories=category::all();
        return view('Dashboard.video.index', compact('modals','categories'));
    }
    
    public function getCategory()
    {
        $categories=category::all();
        return view('Dashboard.video.create',compact('categories'));
    }
   

    public function create(Request $req)
    {
    
       $req->validate([
           
            'video_name' => 'required',
            'audio' => 'required',
            'video' => 'required',
            'premium' => 'required'
            

          ]);
          
         
         try{
           $color=implode(",",$this->color());
           $m= Modal::create([

          'video_name' => $req->video_name,
          'video' => $this->getVideo(),
          'audio' => $this->getAudio(),
          'premium' => $req->premium,
          'category_id' => $req->category_id,
           'color' =>$color,
           'approve' => '0',
          ]);
         
         return redirect()->route('not.approve.video')->with('success','Record Added Successfully');
       }catch(\Exception $e){
         return redirect()->back()->with('success','Somethin is Wrong');
       
       }    
    }

  
    public function edit($id)
    {
        $modal=Modal::findorfail($id);
        return view('Dashboard.video.update',compact('modal'));
    }
    public function update(Request $req, $id)
    {
    
       $req->validate([
       
         'video'=>'required',
         'audio' =>'required',
       
       ]);
        $data=[

        'video_name' => $req->video_name,
          'video' => $video,
          'audio' => $audio,
          'premium' => $req->premium,
           'color' => $req->color,
           'approve'=>$req->approve,
        ];
        Modal::findOrFail($id)->update($data);
        return redirect()->route('video')->with('success','Record Updated Successfully');
    }

    public function destroy($id)
    {
   
        $img=Modal::findorfail($id);
        
         $img->delete();
        return back()->with('success','Record Deleted Successfully');
    }
    
    
    
    
    
    
    
    
    
    public function testVideo(Request $req)
    {
      $req->validate([
      
      'image'=> 'required',
      ]);
    
      
      
     
          try{
          
        
               $ch = curl_init('http://59.103.234.58:8002/create/video/with/image/demo');
               $cfile = curl_file_create($req->image,'image/jpeg','test_name');
               $data = array('file1' => $cfile,'id'=>$req->modal_id,'type'=>$req->type,'user_id'=>Auth::user()->id);
               curl_setopt($ch, CURLOPT_POST,1);
               curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
               $data=curl_exec($ch);
             
             
             return redirect()->back()->with('success','Modal Created');
               
           }catch(\Exception $e){
           
           Return redirect()->back()->with('error','Faild to Train Modals');
           }
          
               
    }
    
    function trainedVideo($id)
    {
      $videos=Video::where('modal_id',$id)->latest()->get();
    
      return view('Dashboard.video.test_video',compact('videos'));
    }
    
    //get song for api with category
    
    function songCategory($id)
    {
    
      $songs=Modal::where('category_id',$id)->orderBy(DB::raw('RAND()'))->get(['id','video_name','audio','premium','color']);
      
      
      
      return $songs;
    
    }
    
   
    
    function trainVideo(Request $req)
    {
      $videos =Video::all();
      return view('Dashboard.video.video',compact('videos'));
    }
    
    function approve(Request $req)
    {
     $modal=Modal::findorfail($req->id);
     
     $modal->approve=$req->approve;
     $modal->save();
     
     return response()->json('ok');  
    
    }
    
    
}

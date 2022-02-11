<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Modal;
use App\Models\Community;

use App\Models\Category;
use Illuminate\Support\Str;
class CommunityController extends Controller
{
    function index(Request $req)
    {
      $type='';
      $modal='';
      if($req->video_type != null)
      {
      $type=$req->video_type;
      }
      if($req->modal_type != null)
      {
      $modal=$req->modal_type;
      }
      $videos=Modal::join('communities','modals.id','=','communities.modal_id')->select('communities.modal_id','communities.id','communities.video','communities.category_id','modals.premium',);
      if($type)
      {
       $videos=$videos->where('premium',$type);
      }
      if($modal)
      {
       $videos=$videos->where('modal_id',$modal);
      }
      $videos=$videos->get();
      $modals=Modal::all();
      $categories=Category::all();
      //dd($categories);
      return view('Dashboard.community.index',compact('videos','modals','categories'));
    }
    function getModal(Request $req)
    {
     $modal=Modal::where('category_id',$req->id)->get();
     return response()->json($modal);
    
    }
    function create()
    {
      
      $categories=Category::all();
      return view('Dashboard.community.create',compact('categories'));
    }
    
    function store(Request $req)
    {
      $req->validate([
        'video'=>'required',
        'modal_id'=>'required',
      ]);
     
       if($req->hasfile('video'))
       {
         $file=$req->file('video');
         $ext=$file->getClientOriginalExtension();
         $filename=Str::uuid().'.'.$ext;
          $file->move('uploads/videos/', $filename);
          $videos='http://127.0.0.1:8001/uploads/videos/'.$filename; 
     
         // $file->move('/var/www/topi/static/train_video/',$filename);
         // $videos='http://59.103.234.58:8002/static/train_video/'.$filename;
       }
       //try{
       $vides=Community::create([
       
       'video'=>$videos,
       'modal_id'=>$req->modal_id,
       'category_id'=>$req->category_id,
       ]);
       
       
       return redirect()->route('comunity.index')->with('success','Community Video Uploaded');
      // }catch(\Exception $e)
      // {
      // return redirect()->back()->with('success','Something went Wrong');
      // }
    }
    
    function destroy($id)
    {
      Community::Destroy($id);
      return redirect()->back()->with('success','Community Video Deleted');
    }
}

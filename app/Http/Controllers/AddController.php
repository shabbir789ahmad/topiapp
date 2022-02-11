<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Add;
use App\Models\Profile;
use App\Http\Traits\ImageTrait;
class AddController extends Controller
{
use ImageTrait;
    function index()
    {
    
      $adds=Add::first();
      
      return view('Dashboard.add.create',compact('adds'));
    }
    
    function create(Request $req)
    {
      
       $add=Add::findorfail($req->id);
       $add->banner_id=$req->banner_id;
        $add->native_id=$req->native_id;
         $add->inter_id=$req->inter_id;
          $add->reward_id=$req->reward_id;
          $add->save();
       return redirect()->back()->with('success','id Updated');
    
    }
    
    function apidata()
    {
    
      $adds=Add::first();
      
      return response()->json($adds);
    }
    
    
      function profile()
      {
    
        $profile=Profile::all();
      
       return view('Dashboard.add.index',compact('profile'));
      }
    
    function profileCreate(Request $req)
    {
      
       $add=Profile::create([
        'profile'=>$this->getProfile(),
       ]);
      return redirect()->route('add.profile_index')->with('success','Profile Uploaded');
    
    }
    function profileUpdate(Request $req)
    {
     
      $data=['profile'=>$this->getProfile()];
      Profile::where('id',$req->id)->update($data);
        return redirect()->back()->with('success','Profile Updated');
    
    }
    
    function companyProfile()
    {
       $profile=Profile::latest()->first('profile');
      
      return response()->json($profile);
    }
    
    
    function destroy($id)
    {
      Profile::Destroy($id);
      return redirect()->back()->with('success','Profile Deleted');
    }
}

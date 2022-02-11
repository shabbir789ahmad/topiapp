<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;
use App\Http\Traits\ImageTrait;
class PrivicyController extends Controller
{
    use ImageTrait;
    function index()
    {
    $privicy=Policy::all();
    return view('Dashboard.privicy.index',compact('privicy'));
    }
    
    function create(Request $req)
    {
      $req->validate([
         
          'profile' => 'required',
          
      ]);
 
      try{
      Policy::create([
       'policy'=>$this->getProfile(),//fro image trait
      ]);
      
      return redirect()->route('privicy.index')->with('success','Policy Created ');
      
     }catch(\Exception $e){
      
     return redirect()->back()->with('success','Something Wrong ');
     }
    
    }
    
    function update($id)
    {
      $privicy=Policy::findorfail($id);
      
      return view('Dashboard.privicy.update',compact('privicy'));
    }
    
    
    function response()
    {
      
      $response=Policy::latest()->first('policy');
      return response()->json($response);
    
    }
    
    function edit(Request $req)
    {
    
      $data=[ 'policy'=>$this->getProfile()];
       
      Policy::where('id',$req->id)->update($data);
      return redirect()->route('privicy.index')->with('success','record Updated ');
    }
    
    function destroy($id)
    {
     
      Policy::Destroy($id);
      return redirect()->back()->with('success','Policy Deleted  ');
     
    }
}

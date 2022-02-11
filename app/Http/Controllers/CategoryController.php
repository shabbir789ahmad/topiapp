<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Traits\ImageTrait;
class CategoryController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $categories=category::all();
        
        return view('Dashboard.category.index',compact('categories'));
    }
    
    function apiCategory()
    {
      $categories=category::all('id','category_name','category_image');
      
        return response()->json($categories);
    }

   
    public function create(Request $req)
    {
    
     $req->validate([ 'category_name'=>'required', 'image'=>'required']);
        category::create([

          'category_name' => $req->category_name,
          'category_image' => $this->getimage(),

        ]);
        return redirect()->route('categories');
    }

    
  

    
    public function edit($id)
    {
       
        $categories=category::findorfail($id);
        return view('Dashboard.category.update',compact('categories'));
    }

    
    public function update(Request $req, $id)
    {
        $req->validate([
         'category_name'=>'required', 
         'image'=>'required'
         ]);
         
        $data=[

        'category_name'=> $req->category_name,
        'category_image' => $this->getimage(),

        ];
        try{
        Category::findOrFail($id)->update($data);
        return redirect()->route('categories');
        }catch(\Exception $e)
        {
          return redirect()->back()->with('success','Something Wrong');
        }
    }

    
    public function destroy(Category $category)
    {
    
        $category->delete();
        return redirect()->back()->with('success','Category Deleted');
    }
}

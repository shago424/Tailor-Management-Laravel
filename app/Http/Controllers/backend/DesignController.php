<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Auth;
use Hash; 
use App\Model\Design;

class DesignController extends Controller

   {
   public function view(){
        $designs = Design::all();
        return view('backend.design.view-design',compact('designs'));
    }
    
    public function add()
    {
         return view('backend.design.view-design');
    }

    public function store(Request $request){
      $data = new design();
      $data->design_name = $request->design_name;
      $data->created_by = Auth::user()->id;
      $data->save();

      return redirect()->route('items.designs.view')->with('success','Data Inserted Successfully');
    }
 
    public function edit($id){
       $editdata = Design::find($id);
       $designs = Design::all();
        return view('backend.design.view-design',compact('editdata','designs'));
    }

    public function update(Request $request,$id){
      $data = Design::find($id);
      $data->design_name = $request->design_name;
      $data->updated_by = Auth::user()->id;
      $data->save();

      return redirect()->route('items.designs.view')->with('success','Data Updated Successfully');


    }



    public function delete($id){
            $design = Design::find($id);
            $design->delete();
          return redirect()->route('items.designs.view')->with('success','Data Deleted Successfully');
 
          } 
}

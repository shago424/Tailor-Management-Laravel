<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Auth;
use Hash; 
use App\Model\Supplier;
use App\Model\Item;
class ItemController extends Controller
{
   public function view(){
        $items = Item::all();
        return view('backend.item.view-item',compact('items'));
    }
    
    public function add()
    {
         return view('backend.item.view-item');
    }

    public function store(Request $request){
      $data = new Item();
      $data->item_name = $request->item_name;
      $data->item_price = $request->item_price;
      $data->tailor_price = $request->tailor_price;
      $data->created_by = Auth::user()->id;
      $data->save();

      return redirect()->route('items.view')->with('success','Data Inserted Successfully');
    }
 
    public function edit($id){
       $editdata = Item::find($id);
       $items = Item::all();
        return view('backend.item.view-item',compact('editdata','items'));
    }

    public function update(Request $request,$id){
      $data = Item::find($id);
      $data->item_name = $request->item_name;
      $data->item_price = $request->item_price;
      $data->tailor_price = $request->tailor_price;
      $data->updated_by = Auth::user()->id;
      $data->save();

      return redirect()->route('items.view')->with('success','Data Updated Successfully');


    }



    public function delete($id){
            $item = Item::find($id);
            $item->delete();
          return redirect()->route('items.view')->with('success','Data Deleted Successfully');
 
          } 
}

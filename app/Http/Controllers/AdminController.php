<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Trip;
class AdminController extends Controller
{
  public function view_catagory()
  {
      $data = catagory::all();
      return view('admin.catagory', compact('data'));
  }

  public function delete_category($id)
  {
    $data = catagory::find($id);
    $data -> delete();
    return redirect()->back()->with('message','Category removed successfully.');
  }


  public function add_category(Request $request){
    
        $data = new catagory;
        
        $data ->catagory_name = $request->catagory;
        
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully');
    
    
  }

  public function view_trip()
  {   $catagory = catagory ::all();
      $data = trip::all();
      return view('admin.trip', compact('catagory'));
  }

  public function add_trip(Request $request){
    
    $data = new trip;
    
    $data->title = $request->title;
    $data->description = $request->description;
    $data->time = $request->time;
    $data->quantity = $request->quantity;
    $data->price = $request->price;
    $data->discount_price = $request->discoount;
    $data->category_id = $request->category;
    //$data->catagory_name = $request->price; slikaaaa



    $data->save();
    return redirect()->back()->with('message','Trip added Successfully');

  }





}

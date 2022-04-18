<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Trip;
use App\Models\Processing;
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

  public function delete_trip($id)
  {
    $data = trip::find($id);
    $data -> delete();
    return redirect()->back()->with('message','Trip removed successfully.');
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

  public function add_trip(Request $request)
  {
    
    $data = new trip;
    
    $data->title = $request->title;
    $data->description = $request->description;
    $data->time = $request->time;
    $data->quantity = $request->quantity;
    $data->price = $request->price;
    $data->discount_price = $request->discoount;
    $data->category_id = $request->category;
    $image = $request->image;
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $image->move('trip',$imagename);
    $data->image = $imagename;




    $data->save();
    return redirect()->back()->with('message','Trip added Successfully');

  }


  public function show_trips(){
 
    $catagory = catagory ::all();
    $data = trip::all();
    return view('admin.alltrips',compact('catagory'),  compact('data'));

  }


  public function view_orders(){
    $data = processing::all();
    return view('admin.orders', compact('data'));
  }

  public function update_trip($id)
  {
    $trip = trip::find($id); 
    $catagory = catagory ::all();
    return view('admin.update_trip', compact('trip'),compact('catagory'));
  }

  public function update_trip_confirm(Request $request, $id)
  {
    $data = trip::find($id);
    $data->title = $request->title;
    $data->description = $request->description;
    $data->time = $request->time;
    $data->quantity = $request->quantity;
    $data->price = $request->price;
    $data->discount_price = $request->discoount;
    $data->category_id = $request->category;
    
    $image = $request->image;
    if($image){
      $imagename = time().'.'.$image->getClientOriginalExtension();
      $image->move('trip',$imagename);
      $data->image = $imagename;
    }
    
    $data->save();
    return redirect()->back()->with('message','Trip Updated Successfully');


  }



}

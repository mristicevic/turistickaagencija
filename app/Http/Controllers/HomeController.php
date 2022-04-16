<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){
        $data = trip::paginate(3);
        return view('user.home',compact('data'));
    }

    public function all_trips(){
        $data = trip::all();
        return view('user.alltrips',compact('data'));
    }

    public function delete($id){
        $data = cart::find($id);
        $data -> delete();
        return redirect()->back()->with('message','Product removed successfully.');

    }

    public function showcart()
    {
        $user= auth()->user();
        $cart = cart::where('name', $user->email)->get();
        $count = cart::where('name',$user->email)->count();
        return view('user.showcart', compact('count','cart'));
        

    }



    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype == '1')
        {
            return view('admin.home');  

        }else{
            $data = trip::all();
            return view('user.home',compact('data')); 
        }
        
    }

    public function search(Request $request){

    $search = $request->search;
    $data = trip::where('title','Like','%'.$search.'%')->get();
    
    return view('user.alltrips',compact('data'));
    
    }

    public function addcart(Request $request, $id){
        if(Auth::id()){
            
            $user = auth()->user();
            $product = product::find($id);
            
            $cart = new cart;
            $cart-> name =$user->email;
            $cart ->product_title = $product->title;
            $cart ->price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back()->with('message','Product Added Successfully');
        }else{
            return redirect('login');
        }
        
        
    }

}


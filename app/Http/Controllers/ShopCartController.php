<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trip;
use App\Models\ShopCart;

class ShopCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
        {
            if(!$request->get('trip_Id')){
                return [
                    'message'=>'Cart items returned',
                    'items' => shopcart::where('user_id', auth()->user()->id)->sum('quantity'), 
                ];
            }
            $trip = trip::where('id',$request->get('trip_Id'))->first();
            
            
            $tripFoundInCart = shopCart::where('trip_id', 
            $request->get('trip_Id'))->pluck('id');


            if( $tripFoundInCart -> isEmpty()){
                $shopcart = shopCart:: create([
                    'trip_id' => $trip->id,
                    'quantity' => 1,
                    'price' => $trip->price,
                    'user_id' => auth()->user()->id,
                    ]);
            }else{
                $shopcart = shopCart::where('trip_id', $request->get('trip_Id'))
            ->increment('quantity');
            }
            
 
            if($shopcart)
            {
            return [
                'message'=>'Cart Updated',
                'items' => shopcart::where('user_id', auth()->user()->id)->sum('quantity'), 
            ];
            }

           
        }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function show($id)
        {
            //
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function getCartItemForCheckout()
    {
        $cartItems = ShopCart::with('trip')->where('user_id', auth()->user()->id)->get();

        $finalData = [];

        $amount = 0;


        if(isset($cartItems))
        {
            foreach($cartItems as $cartItem)
            {
                if($cartItem->trip)
                {
                    foreach($cartItem->trip as $cartProduct)
                    {
                        if($cartProduct->id == $cartItem->trip_id)
                        {
                            $finalData[$cartItem->trip_id]['id'] = $cartProduct->id;
                            $finalData[$cartItem->trip_id]['title'] = $cartProduct->title;
                            $finalData[$cartItem->trip_id]['quantity'] = $cartItem->quantity;
                            $finalData[$cartItem->trip_id]['price'] = $cartItem->price;
                            $finalData[$cartItem->trip_id]['total'] = $cartItem->price * $cartItem->quantity;
                            $amount += $cartItem->price * $cartItem->quantity;
                            $finalData['totalAmount'] = $amount;
                        }
                    }
                }
            }
        }

        return response()->json($finalData);
        
      

    }  


}

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
        //
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
            
 
        

            if($shopcart){
                return['message'=>'Cart Updated'];
            }
            else{
                return response()->json($shopcart, 204);
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
}

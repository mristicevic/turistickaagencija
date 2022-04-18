<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trip;
use App\Models\ShopCart;
use Stripe;
use App\Models\Processing;

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



    public function processPayment(Request $request)
    {
        $firstName = $request->get('firstName');
        $lastName = $request->get('lastName');
        $address = $request->get('address');
        $city = $request->get('city');
        $state = $request->get('state');
        $zipCode = $request->get('zipCode');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $country = $request->get('country');
        $cardType = $request->get('cardType');
        $expirationMonth = $request->get('expirationMonth');
        $expirationYear = $request->get('expirationYear');
        $cvv = $request->get('cvv');
        $cardNumber = $request->get('cardNumber');

        $amount = $request->get('amount');

        $orders = $request->get('order');
        $ordersArray = [];

        // Getting Order Details.

        foreach($orders as $order)
        {
            if($order['id'])
            {
                $ordersArray[$order['id']]['order_id'] = $order['id'];
                $ordersArray[$order['id']]['quantity'] = $order['quantity'];
            }
        }
       
        // Process payment.


        $stripe = Stripe::make(env('STRIPE_KEY'));


        $token = $stripe->tokens()->create([
            'card' => [
                'number' => $cardNumber,
                'exp_month' => $expirationMonth,
                'exp_year' => $expirationYear,
                'cvc'=> $cvv,
            ]]
        );
    
        if(!$token['id']){
            session()->flush('error', 'Stripe Token generation failed');
            return;
        }

        // Create a customer stripe.

        $customer = $stripe->customers()->create([
            'name' => $firstName.' '.$lastName,
            'email' => $email,
            'phone' => $phone,
            'address' => [
                'line1' => $address,
                'postal_code' => $zipCode,
                'city' => $city,
                'state' => $state,
                'country' => $country,
            ],
            'shipping' => [
                'name' => $firstName.' '.$lastName,
                'address' => [
                    'line1' => $address,
                    'postal_code' => $zipCode,
                    'city' => $city,
                    'state' => $state,
                    'country' => $country,
                ],
            ],
            'source' => $token['id'],
        ]);


        // Code for charging the client in Stripe.

        $charge = $stripe->charges()->create([
            'customer' => $customer['id'],
            'currency' => 'EUR',
            'amount' => $amount,
            'description' => 'Payment for order',
        ]);
       
        //return response()->json($charge);

        
        if($charge['status'] == "succeeded")
        {
            // Capture the details from stripe.

            $customerIdStripe = $charge['id'];
            $amountRec = $charge['amount'];
            $client_id = auth()->user()->id;

            $processingDetails = Processing::create([
                'client_id' => $client_id,
                'client_name' => $firstName.' '.$lastName,
                'client_address' => json_encode([
                                        'line1' => $address,
                                        'postal_code' => $zipCode,
                                        'city' => $city,
                                        'state' => $state,
                                        'country' => $country,
                                    ]),
                'order_details' => json_encode($ordersArray),
                'amount' => $amount,
                'currency' => $charge['currency'],
            ]);


            if($processingDetails)
            {
                // Clear the cart after payment success.

                ShopCart:: where('user_id', $client_id)->delete();

                return ['success'=> 'Order completed successfully'];
            }
            
        }
        else
        {
            return ['error'=> 'Order failed contact support'];
        }
        
    }


}

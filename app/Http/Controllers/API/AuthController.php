<?php

namespace App\Http\Controllers\API;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Hash;
//se Illuminate\Support\Auth;
use Illuminate\Support\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8',

        ]);

        if($validator ->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'adress'=>$request->adress,
            'password'=>Hash::make($request->password),
        
        ]);

        $token = $user ->crateToken('auth_token')->plainTextToken;

        return response()->json(['data'=>$user,'access_token'=>$token, 'token_type'=>'Bearer']);



    }

    public function login(Request $request){
        if(!Auth::attempt($request->only('email','password')))
        {
            return response()->jason(['message'=>'Unauthorized'],401);

        }
        $user = User::where('email',$request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['message'=>'Hi'.$user->name.',welcome to home','acess_token'=>$token,'token_type'=>'Bearer']);

    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return ['message'=>'You have successfully logged out and token was successfully deleted'];
    }

}

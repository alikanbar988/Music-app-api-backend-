<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class Authcontroller extends Controller
{
    public function login (Request  $request){
       $credentials=$request->only(['email','password']);
       
       if(Auth::attempt($credentials)){
        $user=Auth::user();
        $access_token =$user->createToken('authToken')->plainTextToken;
       
        return response()->json([
            'success'=>true,
            
            'token'=>$access_token,
            'message'=>'User logged-in successfully'
        ]);
       }else{
        return response()->json([
            'success'=>false,
            'message'=>'Email or Password is incorrect!'
        ]);
       }
    }
    public function register(Request $request)
    {
        $user=user::where('email',$request->email)->first();
        if($user)
        {
            $user = new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);
          
            $user->save();

            $token=$user->createToken('AuthToken')->plainTextToken;
        
            return response()->json([
                    'status'=>true,
                    'message'=>'User created Successfully',
                    'token'=>$token
                ]
            );
            
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'User already exists',
            ]
            );
        }
    }

}
    
            
    

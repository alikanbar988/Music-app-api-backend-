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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            ]);
    
         $access_token = $user->createToken('authToken')->plainTextToken;
         if($user){
         return response()->json([
             'status'=>'success',
             'message'=>'User has been registered!',
             'token'=> $access_token
             ], 201);
    
            
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'User already exists',
            ]
            );
        }
    }
    public function update( $request ,string $id)
    {
        $user=user::findOrfails($id);
        $user->update($request->all());
            return response()->json([
                "status"=>"Success",
                "Message"=>"Profile Updated Success"
            ],201);
        
        

    }

}
    
            
    

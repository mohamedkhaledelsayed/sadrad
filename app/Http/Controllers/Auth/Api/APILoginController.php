<?php


namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use JWTFactory;
use JWTAuth;
use Validator;
class APILoginController extends Controller
{
    public function login(Request $request)
    {
        
        $validator= Validator::make($request->all(), [
            'phone_number'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required',
        ]);
        if ($validator -> fails()) {
            return response()->json($validator->errors());
        }
     
       $credentials =$request->only('phone_number','password');

       try{
           if(! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error'=>'invalid phonenumber and password '],[401]);

           }
       }catch(JWTException $e){
        return response()->json(['error'=>'could not create token '],[500]);

       }

         return response()->json(compact('token'));

      
      
    }
}

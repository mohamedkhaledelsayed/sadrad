<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;

class APIRegisterController extends Controller
{
    public function register(Request $request)
    {
        
        $validator= Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone_number'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users',
            'password' => 'required',
        ]);
        if ($validator -> fails()) {
            return response()->json($validator->errors());
        }
        User::create([
            'name' => $request->get('name'),
            'phone_number'=>$request->get('phone_number'),
            'password' => bcrypt($request->get('password')), 
        ]);
        $user =User::first();
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));
    }
}

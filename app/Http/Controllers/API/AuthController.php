<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function login(Request $request) : JsonResponse
    {
        $request->email =  strtolower($request->email);
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        // return  $request->all();
        if ($validator->fails()) {
            $messages=$validator->messages();
            $errors=$messages->all();
            return response()->json(['message' => join(',', $errors)], 400);
        }
       

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        //  return $token;
        return $this->createNewToken($token);
    }
 protected function createNewToken($token){
    $user = User::find(auth()->user()->id);
     
    $tokens = $user->createToken('personal')->plainTextToken;


        $basepath = env('APP_URL'); 
        return response()->json([
            'access_token' => $tokens,
            'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user(),
            'basepath' => $basepath
        ]);
    }

}

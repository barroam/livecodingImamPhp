<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function Login(){

        $validator=validator(
            $request->all(),[
                'email'=>['required','string','email'],
                'passwors'=>['required','string']
            ]
        );
        if ($validator->false()) {
            return response()->json(['error'=>$validator->errors()],422);
            # code...
        }
    $crendentials = $request->only(["email","password"]);
    $token = auth()->attempt($crendentials);
    if(!$token){
        return response()->json(["message" => "information de connexion incorrectes"],401);
    }
  return response()->json([
    "access_token" => $token,
    "token_type" => "brearer",
    "user" => auth()->user(),
    "expires_in" => env("JWT_TTL") * 60 . "SECONDS"
  ]);
    }
    public function logout (){
        AUTH()->logout();
        return response()->json(["message" => "Déconnexion réussie"]);
    }
    public function refresh(){
        $token =auth()->refresh();
        return response()->json([
            "access_token" => $token,
            "token_type" => "brearer",
            "user" => auth()->user(),
            "expires_in" => env("JWT_TTL") * 60 . "SECONDS"
        ]);
    }
}

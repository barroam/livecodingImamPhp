<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //

    public function customJsonResponse($message,$data,$code=200){
        return responsive()->json([
            "message" =>$message,
            "data" =>$data
        ],$code);
    }
}

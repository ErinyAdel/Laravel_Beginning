<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $users = [
            ["id" => 1, "name"=> "Eriny"],
            ["id" => 2, "name"=> "Eriny2"],
            ["id" => 3, "name"=> "Eriny3"]
        ];

        // foreach( $users as $user ){
        //     echo "Id: ".$user["id"].", Name: ".$user["name"]."\n";
        // }

        return response()->json([$users]);
    }

    public function welcomeApi(){
        return "Welcome To API From Controller";
    }

    public function GetUser1($userId){
        return response()->json("Id: {$userId}");
    }

    public function GetUser2(int $userId){
        if($userId <= 0){
            return response()->json("Access Denied For Id: {$userId}", 403);
        }

        return response()->json("Id: {$userId}");
    }
}

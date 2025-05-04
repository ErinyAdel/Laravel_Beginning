<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function store(StoreProfileRequest $request)
    {
        $profile = Profile::create($request->validated());
        return response()->json([
            "message" => "Profile Created Successfully",
            "Profile" => $profile
        ], 201);
    }
    
    public function show(int $id){
        $profile = Profile::where("user_id", $id)->first();
        if($profile == null) {
            return response()->json("Not Found", 400);
        }

        $user = User::where("id", $id)->firstOrFail();
        return response()->json([
            "Profile" => $profile,
            "User" => $user
        ], 200);
    }
}

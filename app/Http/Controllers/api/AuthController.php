<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegister;
use App\Http\Requests\UserLogin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Register(UserRegister $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        return response()->json(["user"=>$user,"msg"=>"Dang Ky Thanh Cong"],200);
    }

    public function Login(UserLogin $request)
    {
        $validated = $request->validated();
        if(Auth::attempt($validated)){
            $user = Auth::user();
            $token = $user->createToken('lrv8')->accessToken;
            return response()->json(["user"=>$user, "token"=>$token, "msg"=>"Dang nhap thanh cong"],200);
        }
        else
        {
            return response()->json(["msg"=>"Dang nhap that bai"],211);
        }
    }

    public function getMe()
    {
        $user = Auth::user();
        return response()->json(["user"=>$user],200);
    }
}

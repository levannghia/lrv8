<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class MyController extends Controller
{
    public function index(){
        return view('index');
    }
    public function postSignUp(Request $request)
    {
        $request->validate(
            [
                'email'=>'required|unique:users,email|',
                'password'=>'required|min:6',
                'name'=>'required',
                'repassword'=>'required|same:password',
            ],
            [
                'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự',
                'email.unique'=>'Email đã có người sử dụng'
            ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('index')->with('thanhcong','Account successfully created');
    }
    public function postSignIn(Request $request)
    {
        $xacThuc = array('name'=>$request->name,'password'=>$request->password);
        if(Auth::attempt($xacThuc)){
            return redirect()->route('post.index')->with('success','Logged in successfully');
        }
        else{
            return redirect()->back()->with('danger','Login failed');
        }
    }
    public function Logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}

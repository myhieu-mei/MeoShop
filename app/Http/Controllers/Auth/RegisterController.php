<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;


class RegisterController extends Controller
{
   

    function addUser(){
        $users = User::all();

        return view("auth.register",['users'=> $users]);
    }
	function register(Request $request){

        $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required',
            'fullname' => 'required',
            'birthday' => 'required',
            'numphone' => 'required'
           
        ]);
        $username= $request->username;
        $password=$request->password;
        $hashPassword=Hash::make($password);
        $fullname=$request->fullname;
        $birthday=$request->birthday;
        $numphone=$request->numphone;

        $users= new User;

        
        $users->name=$fullname;
        $users->username=$username;
        $users->password=$hashPassword;
        $users->birthday=$birthday;
        $users->numphone=$numphone;
        $users->role='user';
        $users->save();
    
        return redirect("auth/login");
 

}
}

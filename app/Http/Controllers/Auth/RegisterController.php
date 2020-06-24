<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Requests\registerRequest;

class RegisterController extends Controller
{
   

    function addUser(){
        $users = User::all();

        return view("auth.register",['users'=> $users]);
    }
	function register(registerRequest $request){


        $username= $request->username;
        $password=$request->password;
        $hashPassword=Hash::make($password);
        $fullname=$request->fullname;
        $birthday=$request->birthday;
        $numphone=$request->numphone;

        $users= new User;

        
        $users->name=$fullname;
        $users->username=$username;
        $users->password=$hashedPassword;
        $users->birthday=$name;
        $users->numphone=$name;
        $users->role='user';

        $users->save();
    
        return redirect("auth/login");
 

}
}

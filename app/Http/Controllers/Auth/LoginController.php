<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\loginRequest;

class LoginController extends Controller
{
    

	function index(){
		return view("auth.login");
	}
    function login(loginRequest $request){
    $username=$request->username;
    $password=$request->password;
      if(Auth::attempt(["username"=>$username,"password"=>$password])){
        $user=Auth::user();

        if($user->role =="admin"){
          return redirect('/admin/dashboard');
       }
       else{
        return redirect('/home');
        }
       }
}
}




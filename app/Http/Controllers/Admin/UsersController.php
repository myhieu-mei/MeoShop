<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
  
    function index(){
        $users= User::all();
        return view("admin.users.index",["users" => $users]);
    }


    public function edit($id)
    {
        $user= User::find($id);
      return view("admin.users.edit", ["user"=> $user]);
    }

   
    public function update(Request $request, $id)
    {
         $role=$request->role;
        $username = DB::table("users")->where("id",$id)->value("username");
        $password = DB::table("users")->where("id",$id)->value("password");
     
   
        DB::table("users")->where("id", $id)->update(["id"=>$id,"username"=>$username, "password"=>$password,"role"=>$role]);
       return redirect("admin/users");

       
        
    }

  
    public function destroy($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
         return redirect("admin/users");
    }
}


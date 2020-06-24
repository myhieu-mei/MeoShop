<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Profuct;


class CartController extends Controller
{
    function index(){
        $carts=Cart:: all();
        return view("user.cart",["carts" => $carts]);
    }
       public function addcart($id){
       
        $product= Product:: find($id);
        $user= User::find($id);

        $quantity=1;
        $cart= new Cart;
        $cart->user_id= $user->id;
        $cart->product_id= $product->id;
        $cart->quantity= $quantity;
       
        $cart->save(); 
         return redirect("user/carts");

    }
    public function destroy($id)
    {
       
     
        DB::table("products")->where("id" ,"=", $id)->delete();
         return redirect("admin/products");
    }

}

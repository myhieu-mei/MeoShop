<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\registerRequest;
use App\Cart;
use App\Customer;
use App\Order;
use App\Product;
use App\Promotion;
use App\Category;

class CartController extends Controller
{
    function index(){
        $categories= Category::all();
        $idUser = Auth::user()->id;
        $carts = Cart::where('user_id',$idUser)->get();


         return view("user.cart",["carts" => $carts, "categories"=>$categories]);
    }

   
    
    public function addcart($id){
   
        if(Auth::user()){
            $idUser = Auth::user()->id;
               $cart =Cart::where('product_id','=',$id,'and','user_id','=',$idUser)->first();
               if (!$cart){
                Cart::insert(['user_id'=>$idUser,'product_id'=>$id,'quantity' => 1]);
               }
               else
               {
                   $quantity = $cart->quantity+1;
                   DB::table('carts')->where('product_id','=',$id)->update(['quantity' => $quantity]);
                }
         
         return redirect("user/cart"); 
        }
         else {
            return redirect()->back()->with('fatal', 'Login to add to cart!');   
        }
        
    }

    function update(Request $request){
        $product= $request->id;
        if(Auth::user()){
            $idUser = Auth::user()->id;
            $cart =Cart::where('product_id','=',$product,'and','user_id','=',$idUser)->first();
        }
            if($request->method== '-')
            {$quantity = $cart->quantity- 1;}
            else {
                $quantity = $cart->quantity+ 1;
            }
        if($quantity>0){
        DB::table('carts')->where('product_id','=',$product)->update(['quantity' =>$quantity]);
                return redirect("user/cart"); }
        else {
            $this->destroy($request->id);
            return redirect("user/cart");
        }
       
    }
    public function destroy($id)
    {
        if(Auth::user())
            $idUser = Auth::user()->id;
        $cart =Cart::where('product_id','=',$id,'and','user_id','=',$idUser)->delete();
         return redirect("user/cart");
    }

    function createOrder(Request $request){
        $categories= Category::all();
        $idUser = Auth::user()->id;
        $carts = Cart::where('user_id',$idUser)->get();
        $promos= Promotion::where('code',$request->coupon_code)->get();
        return view("user.order",["carts" => $carts,"categories"=>$categories, "promos"=>$promos]);
    }




    
   

}
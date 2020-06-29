<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Cart;
use App\Customer;
use App\Order;
use App\Product;
use App\Promotion;


class CartController extends Controller
{
    function index(){
    
        $idUser = Auth::user()->id;
        $carts = Cart::where('user_id',$idUser)->get();


         return view("user.cart",["carts" => $carts]);
    }
    
    public function addcart($id){
            $idUser = Auth::user()->id;
               $cart =Cart::where('product_id','=',$id,'and','user_id','=',$idUser)->first();
               echo json_encode($cart);
               if (!$cart){
                   DB::table('carts')->insert(['quantity' => 1,'product_id'=>$id,'user_id'=>$idUser]);
               }
               else
               {
                   $quantity = $cart->quantity+1;
                   DB::table('carts')->where('product_id','=',$id)->update(['quantity' => $quantity]);
                }
         
         return redirect("user/cart");

    }
    public function destroy($id)
    {
        DB::table("carts")->where("id" ,"=", $id)->delete();
         return redirect("user/cart");
    }

    function createOrder(){
        $idUser = Auth::user()->id;
        $carts = Cart::where('user_id',$idUser)->get();
        return view("user.order",["carts" => $carts]);
    }

    function order(Request $request){
     
        $cus = new Customer();
        $cus->name= $request->fullname;
        $cus->email=$request->email;
        $cus->phone=$request->numphone;
        $cus->address=$request->address;
        $cus->city=$request->city;
        $cus->zipcode=$request->zip;
        $cus->notes=$request->note;
        $cus->save();

        $bill = new Order();
        $bill->customer_id= $cus->id;
        $promo= Promotion::where('code',$request->promote_code)->first();
        if(!$promo){
            $bill->promo_value = 1;
        }
        else {
            $bill->promo_value=$promo->value;
        }
        // kiem tra xem code giam gia cos ton tai trong trong bang promotions k
        $idUser = Auth::user()->id;
        $carts=Cart::where('user_id',$idUser)->get();
        foreach($carts as $item){
            $bill->total+=$item->quantity;
            $pro=Product::find($item->product_id);
            $bill->total_price+=$pro->new_price*$item->quantity;
        }
        $carts = Cart::where('user_id',$idUser)->get();
        $products= json_encode($carts);
        $bill->products=$products;
        $bill->payment= $request->payment;
        $bill->save();
        DB::table("carts")->where('user_id',$idUser)->delete();
        return redirect("home");
    }

}
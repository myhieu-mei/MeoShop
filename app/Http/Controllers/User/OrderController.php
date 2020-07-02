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



class OrderController extends Controller
{
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
        
        $promo= Promotion::where('code',$request->couponn)->first();
        if(!$promo){
            $bill->promo_code = "NULL";
            $giamgia= 0;
        }
        else {
            $bill->promo_code=$promo->code;
            $giamgia= $promo->value;
        }
        // kiem tra xem code giam gia cos ton tai trong trong bang promotions k
        $idUser = Auth::user()->id;
        $carts=Cart::where('user_id',$idUser)->get();
        $tong=0;
        $a=0;
        $giam=0;
        foreach($carts as $item){
            $bill->total+=$item->quantity;
            $pro=Product::find($item->product_id);
          $tong = $tong + $pro->new_price*$item->quantity;
        }
        if($giamgia==0){
            $bill->total_price = $tong;
        }
        else{
            $giam=$giamgia/100;
            $a =$tong*$giam;
            $bill->total_price = ($tong-$a);
        }
       
        $carts = Cart::where('user_id',$idUser)->get();
        $products= json_encode($carts);
        $bill->products=$products;
        $bill->payment= $request->payment;
        $bill->save();
        DB::table("carts")->where('user_id',$idUser)->delete();

        
       
        return redirect("home");
    }

    function productOrder($id){
        $order = Order::where('id',$id)->first();
        $carts= json_decode($order->products);

       $array = array();
foreach($carts as $cart){
    $abc= Product::where('id',$cart->product_id)->first();
    array_push($array,$abc);
}
        return view("admin.productsOrder",["carts" => $carts, "array"=>$array]);
    
    }
}
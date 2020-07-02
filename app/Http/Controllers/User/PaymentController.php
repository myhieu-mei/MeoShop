<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\Customer;
use App\Order;
use App\Product;
use App\Promotion;
use App\Category;
class PaymentController extends Controller
{
    function coupon(Request $request){  
        $categories= Category::all();
        $idUser = Auth::user()->id;
        $carts = Cart::where('user_id',$idUser)->get();
        $promo= Promotion::where('code',$request->coupon_code)->first();
        return view("user.order",["carts" => $carts,"categories"=>$categories, "promo"=>$promo]);
       
    
    }
}

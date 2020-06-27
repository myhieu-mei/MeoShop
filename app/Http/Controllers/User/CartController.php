<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Cart;
class CartController extends Controller
{
    function index(){
        $carts=Cart:: all();
        $idUser = Auth::user()->id;
        $carts = DB::table('carts')->where('user_id','=',$idUser)->get();
        echo json_encode($carts);
         return view("user.cart",["carts" => $carts]);
    }
    
    public function addcart($id){
            $idUser = Auth::user()->id;
               $cart = DB::table('carts')->where('product_id','=',$id,'and','user_id','=',$idUser);
               if (!$cart){
                   DB::table('carts')->insert(['quantity' => 1,'product_id'=>$id,'user_id'=>$idUser]);
               }
               else
               {
                   $quantity = $cart->quantity + 1;
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
        $carts=Cart:: all();
        return view("user.order",["carts" => $carts]);
    }

    function order(Request $request){
     
        $cus = new Customer();
        $cus->name= $request->name;
        $cus->email=$request->email;
        $cus->numphone=$request->phone;
        $cus->address=$request->address;
        $cus->address=$request->city;
        $cus->address=$request->zipcode;
        $cus->note=$request->notes;
        $cus->save();

        $bill = new Order();
        $bill->id_customer= $cus->id;
        $bill->date_order=date('Y-m-d');
        $bill->promo_code=$request->promo_code; // kiem tra xem code giam gia cos ton tai trong trong bang promotions k
        

        $idUser = Auth::user()->id;
        $carts=Cart::find($idUser);
        foreach($carts as $item){
            $bill->total+=$item->quantity;
            $pro=Product::find($item->product_id);
            $bill->total_price+=$pro->new_price*$item->quantity;
        }
        $bill->note=$request->notes;
        $bill->save();
        echo "Order thanh cong";
    }

}
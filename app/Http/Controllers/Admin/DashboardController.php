<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Cart;
use App\Customer;
use App\Order;
use App\Product;
use App\Promotion;
use App\User;
use App\Category;
class DashboardController extends Controller
{
    function index(){
        $carts= Cart::all();
        $customers = Customer:: all();
        $orders= Order:: all();
        $products= Product::all();
        $promotions= Promotion:: all();
        $users= User::all();
        $categories= Category::all();

        return view("admin.dashboard",["carts" => $carts,"products" => $products,"categories" => $categories , "orders" => $orders, "customers" => $customers, "promotions" => $promotions, "users" => $users] );

    }
}

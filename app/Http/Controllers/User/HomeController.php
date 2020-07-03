<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;

use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    function index(){
        $categories= DB::table("categories")->get();
        $products= DB::table("products")->get();
        return view("user.showproducts",["products" => $products,"categories" => $categories ]);
    }
    function logout(){
        Auth::logout();
        return redirect('/home');
      }
    function product(Request $request){
        $categories= DB::table("categories")->get();
        $page = $request->page;
        $products = Product::all()->skip($page * 6)->take(6);
        if($products->isEmpty()){ 
            $products = Product::all()->take(5);
            return redirect('home?page=0');
        }else if($page<0){
            $totalPage = round(count(products::all())/6)-1;
            return redirect('home?page='.$totalPage);
        }

        return view('user.showproducts', ["products" => $products, "page" => $page,"categories" => $categories]);
    }

    function detail($id){
        $categories= DB::table("categories")->get();
        $products= Product::where('id',$id)->first();
        return view("user.detail",["products" => $products,"categories" => $categories ]);
    }

    function productOfCate(Request $request){
        $cate_id= $request->cate;
        $categories= Category::all();
        $category= Category::where('id',$cate_id)->first();
        $products= Product::where('category_id',$cate_id)->get();
        $page = $request->page;
        $products=  $products->skip($page * 6)->take(6);
        if($products->isEmpty()){ 
            $products = Product::all()->take(5);
            return redirect('home?page=0');
        }else if($page<0){
            $totalPage = round(count(products::all())/6)-1;
            return redirect('home?page='.$totalPage);
        }

        return view('user.showproducts',['products'=>$products,  "categories" => $categories, "page" => $page]);
    }

    function sort(Request $request){
        $categories= Category::all();
        $txtsort = $request->txtSort;
 
        if($txtsort=='tang'){
            $products = Product::orderBy('new_price','ASC')->get();
        }else{
            $products = Product::orderBy('new_price','DESC')->get();
        }

        $page = $request->page;
        $products=  $products->skip($page * 6)->take(6);
        if($products->isEmpty()){ 
            $products = Product::all()->take(5);
            return redirect('home?page=0');
        }else if($page<0){
            $totalPage = round(count(products::all())/6)-1;
            return redirect('home?page='.$totalPage);
        }

        return view('user.showproducts',['products'=>$products,  "categories" => $categories, "page" => $page]);
    }

    
    function searchProduct(Request $request){

        // loi 
        $txt = $request->search_txt;
        $products = DB::table('products')->where('title','LIKE','%'.$txt.'%')->get();
        $categories= Category::all();
        $page = $request->page;
        $products=  $products->skip($page * 6)->take(6);
        if($products->isEmpty()){ 
            $products = Product::all()->take(5);
            return redirect('home?page=0');
        }else if($page<0){
            $totalPage = round(count(products::all())/6)-1;
            return redirect('home?page='.$totalPage);
        }

        return view('user.showproducts',['products'=>$products,  "categories" => $categories, "page" => $page]);
    }

}
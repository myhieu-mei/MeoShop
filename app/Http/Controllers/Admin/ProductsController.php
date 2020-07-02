<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\addProductRequest;
use App\Http\Requests\loginRequest;
class ProductsController extends Controller
{

    function create(){
        $categories= Category::all();
        return view("admin.products.create", ["categories" => $categories]);}
       
       
    function index(){
        $products=Product:: all();
        return view("admin.products.index",["products" => $products]);
    }
       public function store(addProductRequest $request){
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required',
            'category' => 'required',
            'oldprice' => 'required',
            'newprice' => 'required',
            'description' => 'required'
        ]);
        $image= $request->file("image")-> store("public");
        $title=$request->title;  
        $category_id=$request->category;
        $oldprice=$request->oldprice;
        $newprice=$request->newprice;
        $description=$request->description;
  
        $product= new Product;
        $product->title= $title;
        $product->category_id= $category_id;
        $product->image= 'storage/'.$image;
        $product->oldprice= $oldprice;
        $product->newprice= $newprice;
        $product->description= $description;
        $product->save(); 
         return redirect("admin/dashboard");

    }

    public function edit($id)
    {
        $categories= Category::all();
        $product= Product::find($id);
    //    $photo = DB::table("photos")->where("id", $id)->find($id);
      return view("admin.products.edit", ["product"=> $product,"categories" => $categories]);
    }

   
    public function update(Request $request, $id)
    {
        $image= $request->file("image")-> store("public");
        $title=$request->title;  
        $category_id=$request->category;
        $oldprice=$request->oldprice;
        $newprice=$request->newprice;
        $description=$request->description;

        DB::table("products")->where("id", $id)->update(
            ["title" =>  $title,  "image"=> 'storage/'.$image, "category_id"=> $category_id]);
    
         return redirect("admin/dashboard");
        
    }


    public function destroy($id)
    {
       
     
        DB::table("products")->where("id" ,"=", $id)->delete();
         return redirect("admin/dashboard");
    }

}
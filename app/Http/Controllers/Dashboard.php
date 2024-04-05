<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;


class Dashboard extends Controller
{
    public function __construct()
    {
        // لعرض الصفحات يجب تسجيل الدخول
        $this->middleware("auth");
    }
    public function index(Request $request)
    {
        Session::put("data","Welcome to Tuwaiq");
        Cookie::queue('A','Here my cookie',60);
        $user=$request->user()->email;
        return view("dashboard.index");
    }
    

    public function Ttest()
    {
        return view("dashboard.trest");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect("/login");
    }
    public function test()
    {
        $data=DB::table("products")->
        join('product_details','products.id', '=', 'product_details.productid')->get();
        //$data=DB::select("select * from products");
        return Response()->json($data);
    }
    
    

    public function CreateProducts(Request $request)
    {
        $validate=$request->validate([
            'Productname'=> 'required',
        ]);
        $products = Product ::create([
            'Productname'=>$request->Productname
        ]);

        $products->save();
        return redirect('/dashboard/product');
    }
    public function CreateProductsdetails(Request $request)
    {
        $validate=$request->validate([
            'color'=> 'required|string|max:20',
            'price'=> 'required',
            'qty'=> 'required',
            'description'=> 'required',
        ]);
        
        $productsdetails= ProductDetails::create([
            'color'=>$request->color,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'description'=>$request->description,
            'productid'=> $request->product
            
        ]);
        

        $productsdetails->save();
        return redirect('/dashboard/getproductdetails');
        
    }

    
    public function GetProductDetails(Request $request)
    {

    $products=Product::all();
    $productdetails=DB::table('products')
    ->join('product_details','products.id','=','product_details.productid')
    ->select('product_details.id','products.Productname','product_details.color','product_details.price','product_details.qty','product_details.description')
    ->get();
    
        
    return view('dashboard.productdetails',['productdetails' => $productdetails,'products' => $products]); 
    }

    public function GetProductNew(Request $request)
{
    $productName = $request->input('name');

    if ($productName) {
        $products = Product::where('Productname', 'like', '%' . $productName . '%')->get();
    } else {
        $products = Product::all();
    }
    
    return view('dashboard.products', ['products' => $products , 'productName' => $productName]);
}

public function GetProduct(Request $request)
{
    $productName = $request->input('name');

    if ($productName) {
        $products = Product::where('Productname', 'like', '%' . $productName . '%')->get();
    } else {
        $products = Product::all();
    }

    if ($request->input('show_all') === 'true') {
        $products = Product::all();
    }
    
    return view('dashboard.products', ['products' => $products , 'productName' => $productName]);
}


    public function Search(Request $request)
    {
       
    $productName = $request->input('name');

    $products = Product::where('Productname', 'like', '%' . $productName . '%')->get();

    
    return view('dashboard.products', ['products' => $products , 'productName' => $productName]);
    }

    public function SearchDetails(Request $request)
{
    
    $products = Product::all();
    $description = $request->input('name');
    $productdetails = DB::table('products')
        ->join('product_details', 'products.id', '=', 'product_details.productid')
        ->select('products.id', 'products.Productname', 'product_details.color', 'product_details.price', 'product_details.qty', 'product_details.description')
        ->where('product_details.description', 'like', '%' . $description . '%')
        ->get();

    return view('dashboard.productdetails', [
        'productdetails' => $productdetails,
        'description' => $description,
        'products' => $products
    ]);
}


    public function Del($id)
    {
        
        $products = Product::find($id);
        $products->delete();

        return redirect('/dashboard/product');
    }
    
    public function DelDetails($id)
    {
        
        $productdetails = ProductDetails::find($id);
        
        $productdetails->delete();

        return redirect('/dashboard/getproductdetails');
    }
    public function UpdateProducts(Request $request)
    {
        $items=Product::where('id',$request->id)->update([
        'Productname'=>$request->productname,
            
        ]);
        return redirect('/dashboard/product');
        
    }
    public function UpdateProductDetails(Request $request)
    {
        
        $validate=$request->validate([
            'color'=> 'required|string|max:20',
            'price'=> 'required',
            'qty'=> 'required',
            'description'=> 'required',
            

        ]);
        
        $items=ProductDetails::where('id',$request->id)->update([
            
            'color'=>$request->color,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'description'=>$request->description,
            
            
        ]);
        
        
        
        
        
        return redirect('/dashboard/getproductdetails');
        
    }
    public function EditProducts($id)
    {
        
    $products = Product::find($id);
   
    return view('dashboard.edit',['products'=>$products]);
    }
    public function EditProductDetails($id)
{
    $productDetails = ProductDetails::find($id);
    
    
    

    return view('dashboard.edit_product_details', ['productDetails' => $productDetails]);
}




}

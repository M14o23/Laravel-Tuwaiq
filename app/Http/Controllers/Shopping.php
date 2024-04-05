<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use App\Models\user;
use App\Models\Cart;


class Shopping extends Controller
{
    
    public function ShowListItemsPhone(Request $request)
    {
        
        $data=DB::table('products')
        ->join('product_details','products.id','=','product_details.productid')
        ->get();
        // dd($data);
        
        $tax=0.15;
        $descount=10;
        foreach($data as $key=> $row)
        {
            $data[$key]->total=($data[$key]->price*$tax)+$data[$key]->price;
            $data[$key]->descount=$descount;
            $data[$key]->tax=$tax;
            $data[$key]->net=$data[$key]->total - $data[$key]->descount;
        }
        $row=[];
        
        

        
        return view("shopping.list-items",['data'=>$data]);

    }


    public function GetCafeHot()
    {
        $response = Http::withoutVerifying()->get('https://api.sampleapis.com/coffee/hot');
        
        $data=$response->object();
        return view("shopping.cafe",['data'=>$data]);
        
    }

    public function GetUsersAPI()
    {
        $apiURL = 'https://jsonplaceholder.typicode.com/users';
        
        $headers = [
        'Content-Type' => 'application/json',
        
        ];
        $response = Http::withHeaders($headers)->get($apiURL, [
        'email' => 'Sincere@april.biz',
        'verify' => false,
        ]);
        $data = $response->json();
        
        return Response()->json($data);

    }

    public function ShowDetailsPhone($id)
    {
        $data=DB::table('products')
        ->join('product_details','products.id','=','product_details.productid')
        ->where('product_details.id','=',$id)
        ->first();
        
        $tax=0.15;
        $descount=10;
        
        $data->total=($data->price*$tax)+$data->price;
        $data->descount=$descount;
        $data->tax=$tax;
        $data->net=$data->total - $data->descount;
        
        
        
        
        return view("shopping.details",['data'=>$data]);

    }

    public function Add_to_cart(Request $request, $id)
    {
        
        $userId = $request->user()->id;
        
        $data=DB::table('products')->join('product_details','products.id','=','product_details.id')
        ->where('products.id','=',$id)
        ->first();
        
        $tax=0.15;
        $descount=10;
        
        $data->total=(1.15)*$data->price;
        $data->descount=$descount;
        $data->tax=$tax;
        $data->net=$data->total - $data->descount;
        

        $row=[
            'productid'=> $data->id,
            'price'=>$data->price,
            'qty'=> $data->qty,
            'tax'=> $data->tax,
            'total'=> $data->total,
            'desc'=> $data->descount,
            'net'=> $data->net,
            'userid'=>$userId
        ];

        DB::table('carts')->insert($row);

        $count=DB::table('carts')
        ->where('userid','=',$userId)->count();
        Session::put('count', $count);
        return redirect()->back();
        
    }
    
    public function Cart(Request $request)
    {
        $userId = $request->user()->id;
        
        $checkoutData = DB::table('carts')
                        ->join('product_details', 'carts.productid', '=', 'product_details.id')
                        ->select('carts.*', 'product_details.*')
                        ->where('carts.userid', '=', $userId)
                        ->get();
          
            
   
    return view('shopping.cart', ['checkoutData' => $checkoutData]);
    
    }



}

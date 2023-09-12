<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Auth;
use DB;
// use Log;

class CartController extends Controller
{
    public function AddToCartQV(Request $request)
    {
        // Log::info('hi');
        //3 way to retrive data from database

        // $product=DB::table('products')->where('id',$request->id)->first();
        // $product=Product::where('id',$request->id)->first();  

        $product=Product::find($request->id);
        Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>$request->qty,
            'price'=>$request->price,
            'weight'=>'1',
            'options'=>['size'=>$request->size , 'color'=> $request->color ,'thumbnail'=>$product->thumbnail]

        ]);
        return response()->json('product added on cart!'); 

    }
     //all cart
     public function AllCart()
     {
         $data=array();
         $data['cart_qty']=Cart::count();
         $data['cart_total']=Cart::total();
         return response()->json($data);
     }
}

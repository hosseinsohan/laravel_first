<?php

namespace App\Http\Controllers;

use App\Models\product;
use http\Env\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts()
    {
        $producs = product::all()->toJson();
        return response($producs, 200);
    }

    public function createProduct(Request $request)
    {
        $product = new product;
        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();

        return response()->json([
            "message" => "product created"
        ], 201);
    }

    public function updateProduct(Request $request, $id)
    {
        //return response($request,200);
        if(product::where('id', $id)->exists()){
            $product = product::find($id);
            $product->name = is_null($request->name)?$product->name:$request->name;
            $product->price = is_null($request->price)?$product->price:$request->price;
            $product->save();

            return response()->json(['message'=>'product updated', 'status'=>true]);
        }else{
            return response()->json([
                'message'=>'product not found','status'=>false
            ]);
        }
    }

    public function getProduct($id)
    {
        if(product::where('id',$id)->exists()){
            $product = product::where('id', $id)->get();
            return response($product, 200);
        }
        else {
            return response()->json([
                'message'=>'product not found','status'=>false
            ]);
        }
    }

    public function deleteProduct($id)
    {
        if(product::where('id', $id)->exists()){
            $product = product::find($id);
            $product->delete();
            return response()->json(['message'=>'product deleted', 'status'=>true]);
        }else{
            return response()->json([
                'message'=>'product not found','status'=>false
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index(){
        $products = Products::all();
        return response()->json([
            'status' =>200,
            'products'=>$products,
        ]);
    }
    public function add(Request $request){
       // print_r($request->all());die;
       $request->validate([
        'product_name' => 'required',
        'product_image' => 'required|mimes:jpg,png,jpeg,gif,svg',
        'product_price' => 'required',
        'product_description' => 'required',

        ]);
        $path = $request->file('product_image')->store('public/images');
    
        $products=new Products;
        $products->product_name = $request->input('product_name');
        $products->product_price = $request->input('product_price');
        $products->product_description = $request->input('product_description');
        $products->product_image = $path;
        $products->save();
        // if($request->hasfile('product_image'))
        //  {

        //     foreach($request->file('product_image') as $image)
        //     {
        //         $destinationPath = 'public/images/';
        //         $name=$image->getClientOriginalName();
        //         $request['book_id']= $book->id;
        //         $request['image']= $name;
        //         $image->move($destinationPath,$name);
        //         $data[] = $name;  
               
        //     }
        //  }
        return response()->json([
            'status' =>200,
            'message'=>'Products added successfully',
        ]);


    }
    public function destroy($id){
        $products = Products::find($id);
        $products->delete();

        return response()->json([
            'status' =>200,
            'message'=>'Products deleted successfully',
        ]);
    }
    public function edit($id){
        $products = Products::find($id);
		if(is_null($products)){
			return response()->json([
            'status' =>404,
            'message'=>'Products not found',
        ]);
		}
        return response()->json([
            'status' =>200,
            'products'=>$products::find($id),
        ]);

    }
    public function update(Request $request,$id){
        $request->validate([
            'product_name' => 'required',
            'product_image' => 'required|mimes:jpg,png,jpeg,gif,svg',
            'product_price' => 'required',
            'product_description' => 'required',
    
            ]);
        $products = products::find($id);
        $products->product_name = $request->input('product_name');
        $products->product_price = $request->input('product_price');
        $products->product_description = $request->input('product_description');
        $products->update();

        return response()->json([
            'status' =>200,
            'message'=>'Products updated successfully',
        ]);
    }
}

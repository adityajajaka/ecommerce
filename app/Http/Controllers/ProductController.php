<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Image;

class ProductController extends Controller
{
    //
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $productInstance = new Product();
        $products = $productInstance->orderProducts($request->get('order_by'));

        if($request->ajax()) {
            return response()->json($products, 200);
        }
        
        return view('products.index', compact('products'));
    }

    public function show ($id)
    {
    	$product =Product::find($id);
    	if ($product){
    		$reviews = $product->productReviews()->get();
            $star = $reviews->avg('rating');
            return view('products.show',[
                'product'=> $product,
                'reviews'=> $reviews,
                'star'=> $star,
            ]);
    	}else{
    		return redirect('/products')->with('errors', 'Produk tidak ditemukan');
    	}
    }

    public function image($imageName)
    {
    	$filePath = storage_path(env('PATH_IMAGE').'products/'. $imageName);
    	return Image::make($filePath)->response();
    }
}

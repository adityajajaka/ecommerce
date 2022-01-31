<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductReview;
use Auth;

class ProductReviewController extends Controller
{
    public function store($id)
    {
    	$product = Product::find($id);
    	$attribute = request()->all();
    	$attribute['product_id'] = $product->id;
    	$attribute['user_id'] = Auth::user()->id;

    	ProductReview::create($attribute);

    	return back()->with('success', 'Review have been saved');
    }

}

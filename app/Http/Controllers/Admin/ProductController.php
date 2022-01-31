<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products=product::all();
        return view ('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric',
            'image_url' => 'required|string',
            'description' => 'required',
        ]);

        $file = $request->file('image_url');

        $product = new Product();
        $product->user_id = Auth::user()->id;
        $product->name = $request->post('name');
        $product->price= $request->post('price');
        $product->image_url= $request->post('image_url');
        $product->description = $request->post('description');
        $product->save();

        return redirect('admin/products')->with('success', 'Product berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products.show', compact('product', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.products.edit', compact('product', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Product $product)
    {
    
        $product->name = $request->get('name');
        $product->price= $request->get('price');
        $product->image_url= $request->get('image_url');
        $product->description = $request->get('description');
        $product->save();

        return redirect('admin/products')->with('success', 'Product berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('admin/products')->with('success', 'Product berhasil di Delete');
    }
}

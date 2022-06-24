<?php

namespace App\Http\Controllers;

use App\Mail\productDeleteReport;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str as Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create',[
            'category'=>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product= new Product();
        $product->name=$request->get('name');
        $product->description=$request->get('description');
        $product->priority=$request->get('priority');
        $product->category_id=$request->get('category_id');
        $product->url_image=$request->get('url_image');
        $product->value=$request->get('value');
        $product->save();
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product=Product::findOrFail($product->id);
        $category=Category::findOrFail($product->category_id);
        return view('product.show',[
            'product'=>$product,
            'category'=>$category
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit',[
            'product'=>$product,
            'category'=>Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name=$request->get('name');
        $product->description=$request->get('description');
        $product->priority=$request->get('priority');
        $product->category_id=$request->get('category_id');
        $product->url_image=$request->get('url_image');
        $product->value=$request->get('value');
        $product->save();
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $e_mail=auth()->user()->email;

        $product->delete();
        Mail::to($e_mail)
            ->send(new productDeleteReport( $product));
        return redirect('/products');
    }
}

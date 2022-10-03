<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('productview.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $customer = new Customer;
        $customer->customer_name = $request->name;
        $customer->customer_address = $request->address;
        $customer->customer_totalamount = $request->totalamount;
        //print_r($customer->customer_totalamount);exit;     
        $customer->save();
            
        for ($i = 0; $i < count($request->product); $i++) {
            $product_name = $request->product[$i];
            $product_price = $request->price[$i];
            $product_qty = $request->qty[$i];
            $product_amount = $request->total[$i];
            //print_r($product_amount);exit;
            $post = new Product;
            $post->customer_id = $customer->id;
            $post->product_name = $product_name;
            $post->product_price = $product_price;
            $post->product_qty = $product_qty;
            $post->product_amount = $product_amount;
            $post->save();
        }
        return redirect()->route('product.index')
        ->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

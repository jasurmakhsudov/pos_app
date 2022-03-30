<?php

namespace App\Http\Controllers;
use App\Models\Product;

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
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'barcode' => 'required',
            'unit_id' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'qty' => 'required',
        ]);
        return Product::create($request->all()); 
    }

    public function search(Request $request)
    {
        $products = Product::query()->where('name','LIKE', "%{$request->input('query')}%")
            ->get(['name','barcode']);
        $status = "OK"; 
        !count($products)?$status = "Not Found":"";
        return [
            "status" => $status,
            "items" => $products,
        ];
    }
    
    public function show(Request $request)
    {
        $products = Product::query()->where('barcode','LIKE', "{$request->input('barcode')}%")
            ->get(['id','name','barcode','cost','price','qty']);
        $status = "OK"; 
        !count($products)?$status = "Not Found":"";
        return [
            "status" => $status,
            "items" => $products,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

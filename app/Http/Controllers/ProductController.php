<?php

namespace App\Http\Controllers;
use Session;
use Cookie;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Product_reserve;

use Request;
use App\Http\Requests\ProductRequest;
use Auth;
use Alert;
class ProductController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
      $this->middleware('inven',[
        'except' => ['ShowForEmployee']
      ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::get();
         return view('Product.home', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('product.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
          $products = new Product($request->all());
          Alert::success('เพิ่มสินค้าสำเร็จ!');
          $products->save();

          return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ShowForEmployee()
    {
      $products = Product::get();
       return view('Product.ShowForEmployee', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $products = Product::find($id);
        if(empty($products))
          abort(404);
      return view('product.editProduct', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ProductRequest $request)
    {
      $products = Product::findOrFail($id);
        $products->update($request->all());
    Alert::success('แก้ไขข้อมูลแล้ว!');
      return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $products = Product::findOrFail($id);
      $products->delete();
      Alert::success('เราได้ลบสินค้าของคุณแล้ว!');
      return redirect('product');
    }
}

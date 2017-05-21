<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Product;
use App\box_concrette;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Http\Requests\BoxconcreteRequest;
use Session;
use Alert;

class BoxconcreteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

      $products = Product::get();
      $idinvoice = $id;
      return view('Invoice.concretebox.showConcrete', compact('idinvoice','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$idproduct)
    {

      $products = Product::find($idproduct);
      if(empty($products))
      abort(404);
      $idinvoice = $id;
      return view('Invoice.concretebox.addboxconcrete', compact('idinvoice','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoxconcreteRequest $request)
    {
      $boxconcretes = new box_concrette($request->all());
      $boxconcretes->save();
        session()->flash('flash_success','เพิ่มสินค้าสำเร็จ!');
        return redirect('invoiceBoxConcrete/'.$request->idinvoice);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $concrete = box_concrette::find($id);
        if(empty($concrete))
          abort(404);
          $products = Product::find($concrete->idproduct);
            if(empty($products))
              abort(404);
      return view('Invoice.concretebox.editBoxconcrete', compact('concrete','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BoxconcreteRequest $request, $id)
    {
      $concrete = box_concrette::findOrFail($id);
      $concrete->update($request->all());
      session()->flash('flash_success','แก้ไขข้อมูลสำเร็จ!');
    return redirect('invoiceBoxConcrete/'.$request->idinvoice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$idinvoice)
    {
      $concrete = box_concrette::findOrFail($id);
      $concrete->delete();
      session()->flash('flash_success','ลบรายการแล้ว!');
      return redirect('invoiceBoxConcrete/'.$idinvoice);
    }
}

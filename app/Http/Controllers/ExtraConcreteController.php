<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Extra_concrette;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Http\Requests\ExtraconcreteRequest;
use Session;
use Alert;

class ExtraConcreteController extends Controller
{
  public function __construct()
{
    $this->middleware('auth');
  $this->middleware('sale');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $idinvoice = $id;
      return view('Invoice.concretebox.ExtraAddconcrete', compact('idinvoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExtraconcreteRequest $request)
    {
      $boxconcretes = new Extra_concrette($request->all());
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
      $concrete = Extra_concrette::find($id);
        if(empty($concrete))
          abort(404);
      return view('Invoice.concretebox.EditExtraconcrete', compact('concrete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExtraconcreteRequest $request, $id)
    {
      $concrete = Extra_concrette::findOrFail($id);
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
      $concrete = Extra_concrette::findOrFail($id);
      $concrete->delete();
      session()->flash('flash_success','ลบรายการแล้ว!');
      return redirect('invoiceBoxConcrete/'.$idinvoice);
    }
}

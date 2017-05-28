<?php

namespace App\Http\Controllers;

use Session;
use App\Invoice;
use App\Concrete;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Http\Requests\ConcreteRequest;
use Alert;
class ConcreteController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $idinvoice = $id;
      return view('Invoice.concrete.addconcrete', compact('idinvoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConcreteRequest $request)
    {
      $concretes = new Concrete($request->all());
      $concretes->save();
      session()->flash('flash_success','เพิ่มสินค้าสำเร็จ!');
        return redirect('invoiceConcrete/'.$request->idinvoice);
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
      $concrete = Concrete::find($id);
        if(empty($concrete))
          abort(404);
      return view('Invoice.concrete.editConcrete', compact('concrete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConcreteRequest $request, $id)
    {
      $concrete = Concrete::findOrFail($id);
      $concrete->update($request->all());
      session()->flash('flash_success','แก้ไขข้อมูลสำเร็จ!');
    return redirect('invoiceConcrete/'.$request->idinvoice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$idinvoice)
    {
      $concrete = Concrete::findOrFail($id);
      $concrete->delete();
      session()->flash('flash_success','ลบรายการแล้ว!');
      return redirect('invoiceConcrete/'.$idinvoice);
    }
}

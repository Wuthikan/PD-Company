<?php

namespace App\Http\Controllers;
use Session;
use Cookie;
use Illuminate\Http\Request;
use Auth;
use Alert;
use App\Invoice;
use App\Concrete;
use Carbon\Carbon;

class ConcreteInventoryController extends Controller
{
  public function __construct()
{
    $this->middleware('auth');
  $this->middleware('inven');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $invoice = Invoice::whereconcrete()->get();
      return view('Inventory.concrete.home', compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoices = Invoice::find($id);
        $concrete = Concrete::whereconcrete($invoices->id)->get();
          return view('Inventory.concrete.show', compact('invoices','concrete'));
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
      $concrete->shipping = '1';
      $concrete->save();

      $Totalconcrete = Concrete::whereconcrete($concrete->invoices->id)->count();
      $Checkconcrete = Concrete::whereconcretecheck($concrete->invoices->id)->count();
      if($Totalconcrete==$Checkconcrete){
         session()->flash('flash_success','สินค้าถูกยืนยันทั้งหมดแล้ว');
         $invoiceEdit = Invoice::find($concrete->invoices->id);
         $invoiceEdit->shipping = '2';
         $invoiceEdit->save();
         $invoice = Invoice::whereconcrete()->get();
         return view('Inventory.concrete.home', compact('invoice'));
      }
      else {
     session()->flash('flash_success','เปลี่ยนสถานะสินค้าสำเร็จแล้ว!');
      return back();
    }
    }
    public function edit2($id)
    {
      $concrete = Concrete::find($id);
      $concrete->shipping = null;
      $concrete->save();
      $Totalconcrete = Concrete::whereconcrete($concrete->invoices->id)->count();
      $Checkconcrete = Concrete::whereconcretecheck($concrete->invoices->id)->count();
      if($Totalconcrete!=$Checkconcrete){
         $invoiceEdit = Invoice::find($concrete->invoices->id);
         $invoiceEdit->shipping = '1';
         $invoiceEdit->save();
      }
    session()->flash('flash_success','เปลี่ยนสถานะสินค้าสำเร็จแล้ว!');
      return back();
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

<?php

namespace App\Http\Controllers;

use Session;
use Cookie;
use Illuminate\Http\Request;
use Auth;
use Alert;
use App\Invoice;
use App\box_concrette;
use App\Extra_concrette;
use Carbon\Carbon;

class BoxconcreteInventoryController extends Controller
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
      $invoice = Invoice::whereboxconcrete()->get();
      return view('Inventory.boxconcrete.home', compact('invoice'));
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
      $concrete = box_concrette::whereboxconcrete($invoices->id)->get();
      $Extraconcrete = Extra_concrette::whereextraconcrete($invoices->id)->get();
        return view('Inventory.boxconcrete.show', compact('invoices','concrete','Extraconcrete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$type)
    {
        if($type==1){
          $concrete = box_concrette::find($id);
          $concrete->shipping = '1';
          $concrete->save();
          $idinvoice = $concrete->invoices->id;


        }
        elseif($type==2){
          $extraConcrete = Extra_concrette::find($id);
          $extraConcrete->shipping = '1';
          $extraConcrete->save();
          $idinvoice = $extraConcrete->invoices->id;
        }
        $Totalboxconcrete = box_concrette::whereconcrete($idinvoice)->count();
        $Checkboxconcrete = box_concrette::whereconcretecheck($idinvoice)->count();
        $Totalextraconcrete = Extra_concrette::whereconcrete($idinvoice)->count();
        $Checkextraconcrete = Extra_concrette::whereconcretecheck($idinvoice)->count();
        $total= $Totalboxconcrete+$Totalextraconcrete;
        $Sumcheck = $Checkboxconcrete+$Checkextraconcrete;
        if($total==$Sumcheck){
           session()->flash('flash_success','สินค้าถูกยืนยันทั้งหมดแล้ว');
           $invoiceEdit = Invoice::find($idinvoice);
           $invoiceEdit->shipping = '2';
           $invoiceEdit->save();
           $invoice = Invoice::whereboxconcrete()->get();
           return view('Inventory.boxconcrete.home', compact('invoice'));
        }
        else {
       session()->flash('flash_success','เปลี่ยนสถานะสินค้าสำเร็จแล้ว!');
        return back();
      }
    }

    public function edit2($id,$type)
    {
      if($type==1){
        $concrete = box_concrette::find($id);
        $concrete->shipping = null;
        $concrete->save();
        $idinvoice = $concrete->invoices->id;
      }
      elseif($type==2){
        $extraConcrete = Extra_concrette::find($id);
        $extraConcrete->shipping = null;
        $extraConcrete->save();
        $idinvoice = $extraConcrete->invoices->id;
      }
      $Totalboxconcrete = box_concrette::whereconcrete($idinvoice)->count();
      $Checkboxconcrete = box_concrette::whereconcretecheck($idinvoice)->count();
      $Totalextraconcrete = Extra_concrette::whereconcrete($idinvoice)->count();
      $Checkextraconcrete = Extra_concrette::whereconcretecheck($idinvoice)->count();
      $total= $Totalboxconcrete+$Totalextraconcrete;
      $Sumcheck = $Checkboxconcrete+$Checkextraconcrete;
      if($total!=$Sumcheck){
         $invoiceEdit = Invoice::find($idinvoice);
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
    public function Showextra($type)
    {
      if($type=='1'){
      $orderconcrete = box_concrette::whereshowboxconcreteextra()->orderBy('id', 'desc')->get();
    }
    else{
      $orderconcrete = Extra_concrette::whereshowectraconcrete()->orderBy('id', 'desc')->get();
    }
        return view('Inventory.showExtra', compact('orderconcrete','type'));
    }

}

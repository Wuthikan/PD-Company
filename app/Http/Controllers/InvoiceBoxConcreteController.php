<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\box_concrette;
use App\Extra_concrette;
use App\Customer;
use App\Other;
use Illuminate\Http\Request;
use Auth;
use Alert;
use Session;

class InvoiceBoxConcreteController extends Controller
{
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
    public function store()
    {
        $iduser =  Auth::user()->id;
        $type = '2';
        $array = ['idemployee' =>  $iduser,
            'discount' =>  '0',
           'type' => $type,
           'payment' => 0,
           'shipping' => 0
        ];
        $invoices = new Invoice($array);
        $invoices->save();

        $idinvoice   = Invoice::orderBy('id', 'desc')->first();
        $id = $idinvoice->id;
        $idinvoice->code =$iduser.$id;
        $idinvoice->save();

          return redirect('invoiceBoxConcrete/'.$id);
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
      if(empty($invoices))
      abort(404);

      $cusomerid = $invoices->idcustomer;
      if(empty($cusomerid)){
      $customer = "";
      }
      else {
      $customer = Customer::find($cusomerid);
      if(empty($customer))
      abort(404);
      }

      $concrete = box_concrette::whereboxconcrete($invoices->id)->get();
      $Extraconcrete = Extra_concrette::whereextraconcrete($invoices->id)->get();
      $other = Other::whereother($invoices->id)->get();
      $total = 0 ;
      foreach($concrete as $concrete){

      $total = ($concrete->amount*$concrete->height*$concrete->price*$concrete->products->width)+$total;
      }
      foreach($Extraconcrete as $Extraconcrete){

      $total = ($Extraconcrete->amount*$Extraconcrete->height*$Extraconcrete->price*$Extraconcrete->width)+$total;
      }

      foreach($other as $other){

      $total = $other->price+$total;
      }
      $invoices->price = $total;
      $invoices->save();

      $concrete = box_concrette::whereboxconcrete($invoices->id)->get();
      $Extraconcrete = Extra_concrette::whereextraconcrete($invoices->id)->get();
      $other = Other::whereother($invoices->id)->get();

      return view('Invoice.concretebox.createinvoice', compact('invoices','customer','concrete','other','Extraconcrete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      $invoice = Invoice::findOrFail($id);
      $invoice->delete();
      session()->flash('flash_success','ลบใบเสนอราคาสำเร็จ!');
      return redirect('home');
    }
    public function confirm($id)
    {
      $invoices = Invoice::findOrFail($id);
      if ($invoices->idcustomer==null) {
            Alert::error('กรุณาเพิ่มข้อมูลลูกค้า!')->persistent("Close");
            return redirect('invoiceBoxConcrete/'.$id);
      }
      else {
      $invoices->payment = 1;
      $invoices->save();

        return redirect('invoiceall/'.$id);
      }
    }
}

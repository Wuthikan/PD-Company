<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Concrete;
use App\Customer;
use App\Other;
use Illuminate\Http\Request;
use Auth;

class InvoiceConcreteController extends Controller
{
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
        $type = '1';
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
        $idinvoice->code ="QT".$iduser.$id;
        $idinvoice->save();

          return redirect('invoiceConcrete/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
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

        $concrete = Concrete::whereconcrete($invoices->id)->get();
        $other = Other::whereother($invoices->id)->get();
        $total = 0 ;
        foreach($concrete as $concrete){

        $total = ($concrete->amount*$concrete->price)+$total;
        }
        foreach($other as $other){

        $total = $other->price+$total;
        }
        $invoices->price = $total;
        $invoices->save();

        $concrete = Concrete::whereconcrete($invoices->id)->get();
        $other = Other::whereother($invoices->id)->get();

        return view('Invoice.concrete.createinvoice', compact('invoices','customer','concrete','other'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $invoice = Invoice::findOrFail($id);
      $invoice->delete();
      return redirect('home');
    }
    public function editDiscount(Request $request,$id)
    {
      $invoice = Invoice::findOrFail($id);
      $invoice->update($request->all());


    if($invoice->type == 1){
        return redirect('invoiceConcrete/'.$invoice->id);
      }
      else {
      return redirect('invoiceBoxConcrete/'.$invoice->id);
      }
    }

    public function confirm($id)
    {


      $invoices = Invoice::findOrFail($id);
      $invoices->payment = 1;
      $invoices->save();

        return redirect('invoiceall/'.$id);

    }

}

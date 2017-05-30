<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
  public function __construct()
{
  $this->middleware('auth');
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
        $customers = Customer::get();
        $idinvoice = $id;
        return view('Customer.createCustomer', compact('idinvoice','customers'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
      $searchCustomer = Customer::wherecustomer($request->name)->get();

      if($request->name=="สด"||!$searchCustomer->first()){
      $customers = new Customer($request->all());
      $customers->save();
      $idcustomer   = Customer::orderBy('id', 'desc')->first();
      $id = $idcustomer->id;
      $idcustomer->code ="A".$id;
      $idcustomer->save();
      session()->flash('flash_success','เพิ่มข้อมูลลูกค้าใหม่แล้ว');
      }
      else{
        $id = $searchCustomer->first()->id;
        session()->flash('flash_success','มีชื่อลูกค้านี้ในฐานข้อมูล');
      }
      $invoices = Invoice::find($request->idinvoice);
      $invoices->idcustomer =$id;
      $invoices->payment = 1;
      $invoices->save();


      if($invoices->type == 1){
          return redirect('invoiceall/'.$request->idinvoice);
        }
        else {
        return redirect('invoiceall/'.$request->idinvoice);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $customer = Customer::find($id);
        if(empty($customer))
          abort(404);
      return view('Customer.editCustomer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update($id, CustomerRequest $request)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        $invoices = Invoice::find($request->idinvoice);
          if(empty($invoices))
            abort(404);
      if($invoices->type == 1){
          return redirect('invoiceall/'.$request->idinvoice);
        }
        else {
        return redirect('invoiceall/'.$request->idinvoice);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}

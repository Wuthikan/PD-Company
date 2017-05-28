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
     public function autosearch()
     {
       $term = request('term');
        $result = Coustomer::Where('name', 'LIKE', '%' . $term . '%')->get(['id', 'name as value']);
        return response()->json($term);

     }
    public function create($id)
    {
        $idinvoice = $id;
        return view('Customer.createCustomer', compact('idinvoice'));
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {

      $customers = new Customer($request->all());
      $customers->save();
      $idcustomer   = Customer::orderBy('id', 'desc')->first();
      $id = $idcustomer->id;
      $idcustomer->code ="A".$id;
      $idcustomer->save();

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use Auth;
use Carbon\Carbon;

class InvoiceController extends Controller
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
        $userid = Auth::user()->id;
          $invoicesEx = Invoice::whereemployee($userid)->wherestate(0)->orderBy('id', 'desc')->get();
          $invoices = Invoice::whereemployee($userid)->wherestate(1)->orderBy('id', 'desc')->get();
           return view('Invoice.allInvoice', compact('invoices','invoicesEx'));
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
      if(empty($invoices))
      abort(404);
              return view('Invoice/showInvoice',compact('invoices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $invoices = Invoice::findOrFail($id);
      $invoices->payment = 0;
      $invoices->save();

      if($invoices->type == 1){
          return redirect('invoiceConcrete/'.$invoices->id);
        }
        else {
        return redirect('invoiceBoxConcrete/'.$invoices->id);
        }

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

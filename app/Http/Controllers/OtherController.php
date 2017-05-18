<?php

namespace App\Http\Controllers;

use App\Other;
use App\Invoice;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Http\Requests\OtherRequest;

class OtherController extends Controller
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
    public function create($id)
    {
      $idinvoice = $id;
      return view('Others.create', compact('idinvoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OtherRequest $request)
    {
      $others = new Other($request->all());
      $others->save();

      $invoices = Invoice::find($request->idinvoice);
        if(empty($invoices))
          abort(404);
    if($invoices->type == 1){
        return redirect('invoiceConcrete/'.$request->idinvoice);
      }
      else {
      return redirect('invoiceBoxConcrete/'.$request->idinvoice);
      }
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
      $other = Other::find($id);
        if(empty($other))
          abort(404);
      return view('Others.edit', compact('other'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OtherRequest $request, $id)
    {
      $other = Other::findOrFail($id);
      $other->update($request->all());

      $invoices = Invoice::find($request->idinvoice);
        if(empty($invoices))
          abort(404);
    if($invoices->type == 1){
        return redirect('invoiceConcrete/'.$request->idinvoice);
      }
      else {
      return redirect('invoiceBoxConcrete/'.$request->idinvoice);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$idinvoice)
    {
      $other = Other::findOrFail($id);
      $other->delete();

      $invoices = Invoice::find($request->idinvoice);
        if(empty($invoices))
          abort(404);
    if($invoices->type == 1){
        return redirect('invoiceConcrete/'.$request->idinvoice);
      }
      else {
      return redirect('invoiceBoxConcrete/'.$request->idinvoice);
      }
    }
}

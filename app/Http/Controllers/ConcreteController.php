<?php

namespace App\Http\Controllers;


use App\Invoice;
use App\Concrete;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Http\Requests\ConcreteRequest;

class ConcreteController extends Controller
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
      return redirect('invoiceConcrete/'.$idinvoice);
    }
}

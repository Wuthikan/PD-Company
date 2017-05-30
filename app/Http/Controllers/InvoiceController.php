<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Shipping;
use Auth;
use App\User;
use Carbon\Carbon;
use Session;
use App\Concrete;
use App\Other;
use App\box_concrette;
use App\Extra_concrette;
use Illuminate\Database\Eloquent\Model;
use PDF;

class InvoiceController extends Controller
{

  public function __construct()
{
    $this->middleware('auth');
  $this->middleware('sale',[
    'except' => ['taxPDF','PDF']
  ]);
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          // Carbon::setLocale(LC_TIME, 'th_TH');
          // setlocale(LC_TIME, 'th_TH');
          // echo Carbon::now()->formatLocalized('%d %B %Y');
        $userid = Auth::user()->id;
          $invoicesEx = Invoice::whereemployee($userid)->wherestate(0)->orderBy('id', 'desc')->get();
          $invoices = Invoice::whereemployee($userid)->wherestate(1)->orderBy('id', 'desc')->get();
          // dd($invoicesEx);
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

      $shippings = Shipping::whereshipping($id)->get()->count();
      if($shippings>=1){
        $invoice = Invoice::find($id);
        $invoice->shipping = 1;
        $invoice->save();
      }
      else{
        $invoice = Invoice::find($id);
        $invoice->shipping = 0;
        $invoice->save();
      }
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
    public function PDF($id)
    {
      $invoice = Invoice::find($id);
      $datenow = Carbon::now();
      $date = Carbon::now();
      $dateplus = $date->addDays(15);
      $others = Other::whereother($invoice->id)->get();


      if($invoice->type==1){
          $concrete = Concrete::whereconcrete($invoice->id)->get();
          $pdf = PDF::loadView('invoicePDF',compact ('invoice','concrete','datenow','dateplus','others'));
      }elseif ($invoice->type==2) {
        $concrete = box_concrette::whereboxconcrete($invoice->id)->get();
        $Extraconcrete = Extra_concrette::whereextraconcrete($invoice->id)->get();
          $pdf = PDF::loadView('invoicePDF',compact ('invoice','concrete','Extraconcrete','datenow','dateplus','others'));
      }

        return $pdf->download('document.pdf');

    }
    public function taxPDF($id)
    {
      $invoice = Invoice::find($id);
      $datenow = Carbon::now();
      $date = Carbon::now();
      $dateplus = $date->addDays(15);
      $others = Other::whereother($invoice->id)->get();


      if($invoice->type==1){
          $concrete = Concrete::whereconcrete($invoice->id)->get();
          $pdf = PDF::loadView('taxinvoicePDF',compact ('invoice','concrete','datenow','dateplus','others'));
      }elseif ($invoice->type==2) {
        $concrete = box_concrette::whereboxconcrete($invoice->id)->get();
        $Extraconcrete = Extra_concrette::whereextraconcrete($invoice->id)->get();
          $pdf = PDF::loadView('taxinvoicePDF',compact ('invoice','concrete','Extraconcrete','datenow','dateplus','others'));
      }

        return $pdf->download('document.pdf');

    }
}

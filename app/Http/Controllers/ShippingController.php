<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Shipping;
use App\Invoice;
use App\Concrete;
use App\box_concrette;
use App\Extra_concrette;
use Illuminate\Database\Eloquent\Model;
use PDF;
use App\Event;

class ShippingController extends Controller
{


  public function chkAvailable(Request $request)
  {
    $free;
    $date = $request->date;
    $result = DB::table('shipping')->whereDate('date', $date)->count();
    echo "Task:.....................".$result;
    if ($result < 3 ) $free = "FREE :)";
    else $free = "NOT FREE :(";
    echo "<hr>Availability:...............".$free;
  }
  public function showIndex(){
    return view('Shipping/shippingindex');
  }
  public function addShipping(Request $request)
  {
    $shipping       = new Shipping;
    $shipping->type = $request->type;
    $shipping->date = $request->date;
    $shipping->idinvoice = $request->idinvoice;
    $shipping->distance = $request->distance;
    $shipping->licenseplate = $request->licenseplate;
    $shipping->save();

    $shipping   = Shipping::orderBy('id', 'desc')->first();
    $id = $shipping->id;
    $shipping->code ="CO".$id;
    $shipping->save();
    return redirect('shipping/myshipping/'.$request->idinvoice);
  }
  public function shippingList1(){
    $result = DB::table('shipping')->where('type', 1)->get();
    echo $result;
  }
  public function shippingList2(){
    $result = DB::table('shipping')->where('type', 2)->get();
    echo $result;
  }

  public function myshipping($id){
      $shippings = Shipping::whereshipping($id)->get();
      $invoice = Invoice::find($id);
        return view('Shipping.myshipping', compact('shippings','invoice'));
  }
  public function check($id){
      $invoice = Invoice::find($id);
      $databaseEvents = Shipping::wheretypeshipping($invoice->type)->get();
      $calendar = \Calendar::addEvents($databaseEvents);

      $invoice = Invoice::find($id);
    return view('Shipping.createShipping', compact('invoice','calendar'));
  }
  public function check2(Request $request){
    $this->validate($request,[
   'date' => 'required',
   ]);
   $date = $request->date;
   $result = DB::table('shipping')->whereDate('date', $date)->where('type',$request->type)->count();
   $countdate = $result;
       return view('Shipping.createShipping2', compact('result','request'));
  }
  public function edit($id){
      $shipping = Shipping::find($id);
      if(empty($shipping))
        abort(404);
    return view('Shipping.editShipping', compact('shipping'));
  }
  public function editdate(Request $request){
    $this->validate($request,[
   'date' => 'required',
   ]);
   $date = $request->date;
   $result = DB::table('shipping')->whereDate('date', $date)->where('type',$request->type)->count();


   $shipping = Shipping::find($request->id);
   if(empty($shipping))
     abort(404);
       return view('Shipping.editShipping', compact('shipping','result','date'));
  }
  public function update(Request $request, $id){
    $this->validate($request,[
   'date' => 'required',
   ]);
   $shipping = Shipping::findOrFail($id);
   $shipping->update($request->all());

      return redirect('shipping/myshipping/'.$request->idinvoice);
  }
  public function delete($id,$idinvoice){
    $shipping = Shipping::findOrFail($id);
    $shipping->delete();

    $shippings = Shipping::whereshipping($idinvoice)->get();
    $invoice = Invoice::find($idinvoice);
      return view('Shipping.myshipping', compact('shippings','invoice'));
  }
  public function pdf($id,$idinvoice){

    $shipping = Shipping::findOrFail($id);
    $invoice = Invoice::find($idinvoice);
if($invoice->type==1){
    $concrete = Concrete::whereconcrete($invoice->id)->get();
    $pdf = PDF::loadView('shippingPDF',compact ('shipping','invoice','concrete'));
}elseif ($invoice->type==2) {
  $concrete = box_concrette::whereboxconcrete($invoice->id)->get();
  $Extraconcrete = Extra_concrette::whereextraconcrete($invoice->id)->get();
    $pdf = PDF::loadView('shippingPDF',compact ('shipping','invoice','concrete','Extraconcrete'));
}

  return $pdf->stream('document.pdf');

  }
  public function calendar(){

        return view('Shipping/carlendar/menuShip');
  }
  public function showcalendar($id){
    $type = $id;
    $databaseEvents = Shipping::wheretypeshipping($type)->get();
    $calendar = \Calendar::addEvents($databaseEvents);
        return view('Shipping/carlendar/ShowShip',compact('type','calendar'));
  }
}

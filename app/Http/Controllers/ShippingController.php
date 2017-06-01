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
use Alert;

class ShippingController extends Controller
{

  public function __construct()
  {
  $this->middleware('auth');
  }

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
    // $this->validate($request,[
    //   'amount' => 'required',
    //   'bigcar' => 'numeric',
    //   'smallcar'=> 'numeric',
    //  ]);
    $datetime = strtotime($request->date);
    $shipping       = new Shipping;
    $shipping->type = $request->type;
    $shipping->date = $datetime;

    $shipping->idinvoice = $request->idinvoice;
    $shipping->amount = $request->amount;
    $shipping->bigcar = $request->bigcar;
    $shipping->smallcar = $request->smallcar;
    if ($shipping->type=='2') {
    $shipping->crane = $request->crane;
    }
    $shipping->save();

    $shipping   = Shipping::orderBy('id', 'desc')->first();
    $id = $shipping->id;
    $shipping->code ="CO".$id;
    $shipping->save();
      Alert::success('เพิ่มรายการขนส่งเรียบร้อยแล้ว');
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
      if (!$shippings->first()){
          return redirect('shipping/check/'.$id);
        }
    else{
        return view('Shipping.myshipping', compact('shippings','invoice'));
      }
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
   if($request->type=='1'){
   $concrete = Concrete::whereconcrete($request->idinvoice)->get();
 }else{
   $concrete = box_concrette::whereboxconcrete($request->idinvoice)->get();
 }
   $Extraconcrete = Extra_concrette::whereextraconcrete($request->idinvoice)->get();
   $result = DB::table('shipping')->whereDate('date', $date)->where('type',$request->type)->count();
   $countdate = $result;
       return view('Shipping.createShipping2', compact('result','request','concrete','Extraconcrete'));
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
   $date = strtotime($request->date);
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
    $pdf = PDF::loadView('shippingPDF',compact ('shipping','invoice','concrete'), [],['default_font' => 'Garuda']);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Carbon\Carbon;
use App\Shipping;

class ShippingController extends Controller
{
  public function  pdf()
  {
//      $data = [
// 	'foo' => 'bar'
//  ];
//  $pdf = PDF::loadView('pdf', $data);
    $pdf = PDF::loadView('pdf');
    return $pdf->stream('document.pdf');
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
    return view('shippingindex');
  }
  public function showCalendar(){
    return view('calendar');
  }

  public function addShipping(Request $request)
  {
    $shipping       = new Shipping;
    $shipping->type = $request->type;
    $shipping->date = $request->date;
    // dd($shipping);
    $shipping->save();
    echo "The data has been saved!";
  }

  public function shippingList1(){
    $result = DB::table('shipping')->where('type', 1)->get();
    echo $result;
  }

  public function shippingList2(){
    $result = DB::table('shipping')->where('type', 2)->get();
    echo $result;
  }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ShippingController extends Controller
{
  public function test()
  {
    $result = DB::table('shipping')->whereDate('date', '2017-05-15')->count();;
      dd($result);
  }
  public function showIndex(){
    return view('shippingindex');
  }

}

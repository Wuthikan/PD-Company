<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Product;
use App\box_concrette;
use App\Product_reserve;
use App\Extra_product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use App\Http\Requests\BoxconcreteRequest;
use Session;
use Alert;

class BoxconcreteController extends Controller
{
  public function __construct()
{
    $this->middleware('auth');
  $this->middleware('sale');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

      $products = Product::get();
      $idinvoice = $id;
      return view('Invoice.concretebox.showConcrete', compact('idinvoice','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$idproduct)
    {
      $products = Product::find($idproduct);
      if(empty($products))
      abort(404);
      $idinvoice = $id;
      return view('Invoice.concretebox.addboxconcrete', compact('idinvoice','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoxconcreteRequest $request)
    {
      $boxconcretes = new box_concrette($request->all());
      $boxconcretes->save();

      $boxcon   = box_concrette::orderBy('id', 'desc')->first();
      $amountproduct = $boxcon->products->amount;
      if ($boxcon->amount<=$amountproduct) {
        $lastamount = $amountproduct-$boxcon->amount;

        $array = ['idproduct' =>  $boxcon->products->id,
            'idboxconcrete' =>  $boxcon->id
        ];
        $reserve = new Product_reserve($array);
        $reserve->save();
        $boxcon->state ='1';  //1 คือจองสินค้าแล้ว
        $boxcon->save();
        $product = Product::find($boxcon->products->id);
        $product->amount =$lastamount;
        $product->save();

      }else {
        $array = ['idproduct' =>  $boxcon->products->id,
            'idboxconcrete' =>  $boxcon->id
        ];
        $extraProduct = new Extra_product($array);
        $extraProduct->save();
        $boxcon->state ='2';  //2 คือสั่งผลิตสินค้าที่มีอยู่ในตารางproduct
        $boxcon->save();
      }
        session()->flash('flash_success','เพิ่มสินค้าสำเร็จ!');
        return redirect('invoiceBoxConcrete/'.$request->idinvoice);
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
      $concrete = box_concrette::find($id);
        if(empty($concrete))
          abort(404);
          $products = Product::find($concrete->idproduct);
            if(empty($products))
              abort(404);
      return view('Invoice.concretebox.editBoxconcrete', compact('concrete','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BoxconcreteRequest $request, $id)
    {
      $concrete = box_concrette::findOrFail($id);
      if ($concrete->state=='1') {
          //คืนสินค้าจากตารางจองเข้าตารางproduct
          $lookReserve = Product_reserve::whereproductreserve($concrete->idproduct,$concrete->id)
          ->first();
          $product = Product::find($lookReserve->idproduct);
          $pushProduct= $product->amount +$lookReserve->box_concrettes->amount;
          $product->amount = $pushProduct;
          $product->save();
          $lookReserve->delete();
          //เพิ่มสินค้าใหม่
          $concrete->update($request->all());
          $concretes = box_concrette::findOrFail($id);
          $amountproduct = $pushProduct;
          if ($concretes->amount<=$amountproduct) {
            $lastamount = $amountproduct-($concretes->amount);

            $array = ['idproduct' =>  $concretes->products->id,
                'idboxconcrete' =>  $concretes->id
            ];
            $reserve = new Product_reserve($array);
            $reserve->save();
            $concretes->state ='1';  //1 คือจองสินค้าแล้ว
            $concretes->save();
            $products = Product::find($concretes->products->id);
            $products->amount = $lastamount;
            $products->save();
          }else {
            $array = ['idproduct' =>  $concretes->products->id,
                'idboxconcrete' =>  $concretes->id
            ];
            $extraProduct = new Extra_product($array);
            $extraProduct->save();
            $concretes->state ='2';  //2 คือสั่งผลิตสินค้าที่มีอยู่ในตารางproduct
            $concretes->save();
          }

      }elseif($concrete->state=='2') {
        $concrete->update($request->all());
        $concretes = box_concrette::findOrFail($id);
        $amountproduct = $concretes->products->amount;
        if ($concretes->amount<=$amountproduct) {
          $lookReserve = Extra_product::whereextrareserve($concretes->idproduct,$concretes->id)
          ->first();
          $lookReserve->delete();
          $lastamount = $amountproduct-($concretes->amount);
          $array = ['idproduct' =>  $concretes->products->id,
              'idboxconcrete' =>  $concretes->id
          ];
          $reserve = new Product_reserve($array);
          $reserve->save();
          $concretes->state ='1';  //1 คือจองสินค้าแล้ว
          $concretes->save();
          $products = Product::find($concretes->products->id);
          $products->amount = $lastamount;
          $products->save();
        }else {
          $concrete->update($request->all());
        }

      }

      session()->flash('flash_success','แก้ไขข้อมูลสำเร็จ!');
    return redirect('invoiceBoxConcrete/'.$request->idinvoice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$idinvoice)
    {
      $concrete = box_concrette::findOrFail($id);
      if($concrete->state=='1'){
        $lookReserve = Product_reserve::whereproductreserve($concrete->idproduct,$concrete->id)
        ->first();
        $product = Product::find($lookReserve->idproduct);
        $pushProduct= $product->amount +$lookReserve->box_concrettes->amount;
        $product->amount = $pushProduct;
        $product->save();
        $lookReserve->delete();
      }
      elseif($concrete->state=='2'){
        $lookReserve = Extra_product::whereextrareserve($concrete->idproduct,$concrete->id)
        ->first();
        $lookReserve->delete();
      }
      $concrete->delete();
      session()->flash('flash_success','ลบรายการแล้ว!');
      return redirect('invoiceBoxConcrete/'.$idinvoice);
    }
}

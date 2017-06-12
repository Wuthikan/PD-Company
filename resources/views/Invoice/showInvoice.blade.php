@extends('layouts.main')

@section('content')

<!--Courses-->
<section id ="courses" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2>ใบเสนอราคา QT{{ $invoices->code }}</h2>
        <hr class="bottom-line">
      </div>
    </div>

    <div class="row">
      <div class="header-section text-left">
        <p><b>วันทีสร้างรายการ:</b>  {{ $invoices->created_at->formatLocalized('%d %B %Y') }}</p>
        <p><b>ประเภทรายการ:</b>
           @if($invoices->type=='1')
         คอนกรีตผสม
        @else
         แผ่นพื้น
        @endif</p>
        <p><b>ชื่อลูกค้า:</b>
          @if(isset($invoices->idcustomer))
          {{ $invoices->customers->name }}

          <a href="{{ url("customer/{$invoices->customers->id}/edit?idinvoice={$invoices->id}") }}">แก้ไข <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </a>
        @else
          ไม่มีข้อมูล
          <a href="{{ route('customer.add', ['id' => $invoices->id])}}">เพิ่ม</a>
        @endif </p>
        <p><b>สถานะการส่งสินค้า:</b>
          @if($invoices->shipping==0)
             ยังไม่ได้เลือกวันส่งสินค้า
          @elseif($invoices->shipping==1)
            เลือกวันส่งสินค้าแล้ว
          @elseif($invoices->shipping==2)
            ส่งสินค้าแล้ว
          @endif
      </p>
      <p><b>สถานะใบเสร็จ:</b>
        @if($invoices->signature==null)
         รอการอนุมัติ
        @else
         อนุมัติแล้ว
        @endif
    </p>
      </div>
    </div>

  <br>


<div class="row">

  <div class="col-md-4 col-sm-4">
    <div class="service-box text-center">
        <a href="{{ route('shipping.myShipping', ['id' => $invoices->id])}}">
      <div class="icon-box">
        <i class="fa fa-truck color-green"></i>
      </div>
      <div class="icon-text">
        <h4 class="ser-text">ดูรายการส่งสินค้า</h4>
      </div>
      </a>
    </div>
  </div>
  <div class="col-md-4 col-sm-4">
    <div class="service-box text-center">
        <a href="{{ route('invoice.pdf', ['id' => $invoices->id ]) }}"  >
      <div class="icon-box">
        <i class="fa fa-file-text-o color-green"></i>
      </div>
      <div class="icon-text">
        <h4 class="ser-text">พิมพ์ใบเสนอราคา</h4>
      </div>
        </a>
    </div>
  </div>
  <div class="col-md-4 col-sm-4">
    <div class="service-box text-center">
      <a href="{{ route('taxinvoice.pdf', ['id' => $invoices->id ]) }}"  >

      <div class="icon-box">
        <i class="fa fa-money color-green"></i>
      </div>
      <div class="icon-text">
        <h4 class="ser-text">พิมพ์ใบเสร็จ</h4>
      </div>
    </a>
    </div>
  </div>
</div>
<br>

    <div class="row">
        	<div class="col-xs-12 col-md-3 col-sm-4">
              <p>
                <a href="{{ route('invoice.edit', ['id' => $invoices->id])}}">
        					<button name="button" type="button" class="btn btn-green btn-block btn-flat">
        					แก้ไขใบเสนอราคา <i class="fa fa-pencil" aria-hidden="true"></i></button>
        				</a>
              </p>
          </div>
          @if (Auth::guest())
          @elseif(Auth::user()->class == 4 )
          <div class="col-xs-12 col-md-6 col-sm-4">
          </div>
          <div class="col-xs-12 col-md-3 col-sm-4">
              <p>
                <a href="{{ route('invoice.signatureCheck', ['id' => $invoices->id])}}">
        					<button name="button" type="button" class="btn btn-green btn-block btn-flat">
                    @if($invoices->signager==null)
        					ยืนยันรายการ
                    @else
                  ยกเลิกการยืนยันรายการ
                  <i class="fa fa-check-square-o" aria-hidden="true"></i></button>
        				</a>


              </p>
          </div>
        @endif
    </div>
  </div>
</section>
  <!-- <iframe src="{{ route('taxinvoice.pdf', ['id' => $invoices->id ]) }}"
     width="800px" height="600px"  type="application/pdf" > -->
<!--/ Courses-->
@endsection

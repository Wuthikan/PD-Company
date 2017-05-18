@extends('layouts.main')

@section('content')

<!--Courses-->
<section id ="courses" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2>ใบเสนอราคา {{ $invoices->code }}</h2>
        <hr class="bottom-line">
      </div>
    </div>

    <div class="row">
      <div class="header-section text-left">
        <p><b>วันทีสร้างรายการ:</b>  {{ $invoices->created_at->formatLocalized('%d %B %Y') }}</p>
        <p><b>ชื่อลูกค้า:</b>
          @if(isset($invoices->idcustomer))
          {{ $invoices->customers->name }}
        @else
          -
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
      </div>
    </div>

  <br>

    <div class="row">
      <div class="col-md-4 col-sm-4 padleft-right">
        <figure class="imghvr-fold-up">
          <img src="{{ url('mentor/img/course01.jpg') }}" class="img-responsive">
          <figcaption>
                <h3>ดูรายการส่งสินค้า</h3>
          </figcaption>
          <a href="#"></a>
        </figure>
      </div>
      <div class="col-md-4 col-sm-4 padleft-right">
        <figure class="imghvr-fold-up">
          <img src="{{ url('mentor/img/course01.jpg') }}" class="img-responsive">
          <figcaption>
              <h3>พิมพ์ใบเสร็จ</h3>

          </figcaption>
          <a href="#"></a>
        </figure>
      </div>
      <div class="col-md-4 col-sm-4 padleft-right">
        <figure class="imghvr-fold-up">
          <img src="{{ url('mentor/img/course01.jpg') }}" class="img-responsive">
          <figcaption>
                <h3>พิมพ์ใบเสนอราคา</h3>

          </figcaption>
          <a href="#"></a>
        </figure>
      </div>
    </div>

    <div class="row">
        	<div class="col-xs-6 col-md-3 col-sm-4">
        <p>
          <a href="{{ route('invoice.edit', ['id' => $invoices->id])}}">
  					<button name="button" type="button" class="btn btn-green btn-block btn-flat">
  					แก้ไขใบเสนอราคา </button>
  				</a>
        </p>

      </div>
    </div>
  </div>
</section>
<!--/ Courses-->
@endsection

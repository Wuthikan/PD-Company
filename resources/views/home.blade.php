@extends('layouts.main')

@section('content')
<!--Banner-->
<div class="banner">
  <div class="bg-color">
    <div class="container">
      <div class="row">
        <div class="banner-text text-center">
          <div class="text-border">
            <h2 class="text-dec">PD Concrete Part</h2>
          </div>
          <div class="intro-para text-center quote">
            <p class="big-text">Service Mind</p>
            <p class="small-text"> <br></p>
            <a href="{{ url('/manu-Invoice') }}" class="btn">Add Order</a>
          </div>
          <a href="#feature" class="mouse-hover"><div class="mouse"></div></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Banner-->
<!--Courses-->
<section id ="feature" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2>MENU</h2>
        <p><br></p>
        <hr class="bottom-line">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <div class="service-box text-center">
              <a href="{{ route('invoice.pdf', ['id' => '2' ]) }}"  >
          <div class="icon-box">
            <i class="fa fa-truck color-green"></i>
          </div>
          <div class="icon-text">
            <h4 class="ser-text">รายการสินค้า</h4>
          </div>
          </a>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="service-box text-center">
            <a href="{{ url('/manu-Invoice') }}">
          <div class="icon-box">
          <i class="fa fa-calculator" aria-hidden="true"></i>
          </div>
          <div class="icon-text">
            <h4 class="ser-text">สร้างใบสั่งซื้อ</h4>
          </div>
          </a>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="service-box text-center">
            <a href="{{ url('/invoiceall') }}">
          <div class="icon-box">
            <i class="fa fa-file-text" aria-hidden="true"></i>
          </div>
          <div class="icon-text">
            <h4 class="ser-text">รายการสั่งซื้อ</h4>
          </div>
          </a>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <div class="service-box text-center">
            <a href="{{ url('/calendarShipping') }}">
          <div class="icon-box">
          <i class="fa fa-calendar" aria-hidden="true"></i>
          </div>
          <div class="icon-text">
            <h4 class="ser-text">ตารางคิวรถ</h4>
          </div>
          </a>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="service-box text-center">
            <a href="{{ url('/Inventory') }}">
          <div class="icon-box">
        <i class="fa fa-database" aria-hidden="true"></i>
          </div>
          <div class="icon-text">
            <h4 class="ser-text">ฝ่ายคลัง</h4>
          </div>
          </a>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="service-box text-center">
            <a href="">
          <div class="icon-box">
            <i class="fa fa-line-chart" aria-hidden="true"></i>
          </div>
          <div class="icon-text">
            <h4 class="ser-text">รายการสรุป</h4>
          </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Courses-->
@endsection

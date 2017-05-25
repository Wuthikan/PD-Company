@extends('layouts.menuinventory')

@section('content')
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
            <a href="{{ url('/product') }}">
          <div class="icon-box">
            <i class="fa fa-folder-open" aria-hidden="true"></i>

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
          <i class="fa fa-truck color-green"></i>
          </div>
          <div class="icon-text">
            <h4 class="ser-text">รายการสั่งคอนกรีตผสมเสร็จ</h4>
          </div>
          </a>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="service-box text-center">
            <a href="{{ url('/manu-Invoice') }}">
          <div class="icon-box">
          <i class="fa fa-truck color-green"></i>
          </div>
          <div class="icon-text">
            <h4 class="ser-text">รายการสั่งแผ่นพื้น</h4>
          </div>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection

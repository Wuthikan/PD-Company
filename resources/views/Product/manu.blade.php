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
      <div class="col-md-3 col-sm-6 col-xs-12">
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
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box text-center">
            <a href="{{ url('/Invenry/manuExtra') }}">
          <div class="icon-box">
            <i class="fa fa-cart-plus" aria-hidden="true"></i>
          </div>
          <div class="icon-text">
            <h4 class="ser-text">สินค้าที่สั่งผลิต</h4>
          </div>
          </a>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="service-box text-center">
            <a href="{{ url('/ConcreteInventory') }}">
          <div class="icon-box">
          <i class="fa fa-truck color-green"></i>
          </div>
          <div class="icon-text">
            <h4 class="ser-text">รายการสั่งคอนกรีตผสมเสร็จ</h4>
          </div>
          </a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12 ">
        <div class="service-box text-center">
            <a href="{{ url('/BoxConcreteInventory') }}">
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

@extends('layouts.menuinventory')

@section('content')
<!--/ Banner-->
<!--Courses-->
<section id ="feature" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2>สินค้าที่ถูกสั่งผลิต</h2>
        <p><br></p>
        <hr class="bottom-line">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="service-box text-center">
            <a href="{{ url('/manuExtra/showExtra/1') }}">
          <div class="icon-box">
            <i class="fa fa-folder-open" aria-hidden="true"></i>

          </div>
          <div class="icon-text">
            <h4 class="ser-text">สินค้าปกติ</h4>
          </div>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="service-box text-center">
            <a href="{{ url('/manuExtra/showExtra/2') }}">
          <div class="icon-box">
            <i class="fa fa-folder-open" aria-hidden="true"></i>

          </div>
          <div class="icon-text">
            <h4 class="ser-text">สินค้าขนาดพิเศษ</h4>
          </div>
          </a>
        </div>
      </div>




    </div>
    <div class="row">
      <hr>
      <div class="col-md-1">
        <a href="{{ url('/Inventory') }}">
          <i class="fa fa-chevron-left" aria-hidden="true"></i> Back
        </a>
      </div>
    </div>
  </div>

</section>

@endsection

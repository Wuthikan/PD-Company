@extends('layouts.main')

@section('content')
<!--Courses-->
<section id ="courses" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2>สร้างใบสั่งซื้อ</h2>

        <hr class="bottom-line">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-6 padleft-right">
        <figure class="imghvr-fold-up">
          <img src="img/IMG_7169.jpg" class="img-responsive">
          <figcaption>
              <h3>คอนกรีตผสมเสร็จซีแพค</h3>
          </figcaption>

              <a href="{{ url('/invoice/concrete') }}">
              </a>
        </figure>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6 padleft-right">
        <figure class="imghvr-fold-up">
          <img src="img/IMG_7191.jpg" class="img-responsive">
          <figcaption>
              <h3>แผ่นพื้น Hollow core ซีแพค</h3>
          </figcaption>
          <a href="{{ url('/invoice/concretebox') }}"></a>
        </figure>
      </div>




    </div>
  </div>
</section>

<!--/ Courses-->
@endsection

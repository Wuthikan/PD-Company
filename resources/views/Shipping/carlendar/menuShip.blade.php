@extends('layouts.main')

@section('content')
<!--Courses-->
<section id ="courses" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2>ตารางส่งของ</h2>

        <hr class="bottom-line">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-6 padleft-right">
        <figure class="imghvr-fold-up">
          <img src="img/IMG_7171.jpg" class="img-responsive">
          <figcaption>
              <h3>คอนกรีตผสมเสร็จซีแพค</h3>
          </figcaption>

              <a href="{{ url('/calendarShipping/1') }}">
              </a>
        </figure>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6 padleft-right">
        <figure class="imghvr-fold-up">
          <img src="img/IMG_7172.jpg" class="img-responsive">
          <figcaption>
              <h3>แผ่นพื้น Hollow core ซีแพค</h3>
          </figcaption>
          <a href="{{ url('/calendarShipping/2') }}"></a>
        </figure>
      </div>




    </div>
  </div>
</section>

<!--/ Courses-->
@endsection

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>PD company</title>
        <meta charset="utf-8">
        <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
        <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
      <!-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans"> -->
      {!! HTML::style('Mentor/css/font-awesome.min.css') !!}
      {!! HTML::style('Mentor/css/bootstrap.min.css') !!}
      {!! HTML::style('Mentor/css/imagehover.min.css') !!}
      {!! HTML::style('Mentor/css/style.css') !!}
      {!! HTML::style('sweetalert-master/dist/sweetalert.css') !!}
      {!! HTML::style('fullcalendar/fullcalendar.css') !!}
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    @yield('autocompax')
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
<body>
  @if(session()->has('flash_success'))
  <?php Alert::success(session()->get('flash_success'));
  ?>
  @endif
  @if($errors->any())

        @foreach($errors->all() as $error)
        <?php
        Alert::info($error)->persistent("Close");
        ?>
        @endforeach
  @endif
  <!--Navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/home') }}">PD<span>Concrete</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('/home') }} ">หน้าแรก</a></li>
        <li><a href="{{ url('/Product/Shows') }}">สินค้า</a></li>
        <li><a href="{{ url('/manu-Invoice') }}">สั่งซื้อ</a></li>
        <li><a href="{{ url('/invoiceall') }}">รายการสั่งซื้อ</a></li>
        <li><a href="{{ url('/calendarShipping') }}">ขนส่ง</a></li>
        @if (Auth::guest())
        @elseif(Auth::user()->class == 4 )
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      Manager <i class="fa fa-caret-down" aria-hidden="true"></i>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/home') }} ">ฝ่ายขาย</a></li>
                        <li><a href="{{ url('/Inventory') }} ">ฝ่ายคลัง</a></li>
                        <li><a href="{{ url('/Usermanagement') }} ">จัดการผู้ใช้</a></li>
                  </ul>
              </li>
            @endif
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Myprofile <i class="fa fa-sign-out" aria-hidden="true"></i>
                </a>

                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="{{ url('/user/edit/'.Auth::user()->id ) }} ">แก้ไขข้อมูลส่วนตัว</a>
                  </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            ลงชื่อออก
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
      </ul>

      </div>
    </div>
  </nav>
  <!--/ Navigation bar-->

    @yield('content')

        <footer id="footer" class="footer">
          <div class="container text-center">



          <hr>
            ©2016 PD Concrete Part, Ltd.
            <div class="credits">
                523/1 Moo.15, Tumbon Borhaew, Aumphur MuangLumpang, 52100
            </div>
          </div>
        </footer>
        <!--/ Footer-->
        <!-- {!! HTML::script('js/jquery-3.2.1.slim.js') !!} -->
        {!! HTML::script('Mentor/js/jquery.min.js') !!}
        {!! HTML::script('Mentor/js/jquery.easing.min.js') !!}
        {!! HTML::script('Mentor/js/bootstrap.min.js') !!}
        {!! HTML::script('Mentor/js/custom.js') !!}
        {!! HTML::script('Mentor/contactform/contactform.js') !!}
        {!! HTML::script('sweetalert-master/dist/sweetalert.min.js') !!}
        @yield('scripts')

        @include('sweet::alert')
</body>
</html>

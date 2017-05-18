<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
      <title>company</title>
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
      {!! HTML::style('Mentor/css/font-awesome.min.css') !!}
      {!! HTML::style('Mentor/css/bootstrap.min.css') !!}
      {!! HTML::style('Mentor/css/imagehover.min.css') !!}
      {!! HTML::style('Mentor/css/style.css') !!}
  </head>
<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">PD<span> Concrette</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('/home') }} ">หน้าแรก</a></li>
        <li><a href="{{ url('/product') }}">สินค้า</a></li>
        <li><a href="{{ url('/manu-Invoice') }}">สั่งซื้อ</a></li>
        <li><a href="{{ url('/invoiceall') }}">รายการสั่งซื้อ</a></li>
        <li><a href="{{ url('/basket') }}">ขนส่ง</a></li>
        <li><a href="{{ url('/basket') }}">การผลิต</a></li>
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>
        @else
            <li class="ิdropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
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



          <ul class="social-links">
            <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
          </ul>
            ©2016 Mentor Theme. All rights reserved
            <div class="credits">
                <!--
                    All the links in the footer should remain intact.
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Mentor
                -->
                Designed by <a href="https://bootstrapmade.com/">Free Bootstrap Themes</a>
            </div>
          </div>
        </footer>
        <!--/ Footer-->
        {!! HTML::script('Mentor/js/jquery.min.js') !!}
        {!! HTML::script('Mentor/js/jquery.easing.min.js') !!}
        {!! HTML::script('Mentor/js/bootstrap.min.js') !!}
        {!! HTML::script('Mentor/js/custom.js') !!}
        {!! HTML::script('Mentor/contactform/contactform.js') !!}

</body>
</html>

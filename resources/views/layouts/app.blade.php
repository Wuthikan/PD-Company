<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PD</title>
    <!-- Styles -->
    <!-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans"> -->
    {!! HTML::style('Mentor/css/font-awesome.min.css') !!}
    {!! HTML::style('Mentor/css/bootstrap.min.css') !!}
    {!! HTML::style('Mentor/css/imagehover.min.css') !!}
    {!! HTML::style('Mentor/css/style.css') !!}
    {!! HTML::style('sweetalert-master/dist/sweetalert.css') !!}
    {!! HTML::style('fullcalendar/fullcalendar.css') !!}
  <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
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
      <a class="navbar-brand" href="{{ url('/home') }}">PD<span>Concrete</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('/Inventory') }} ">หน้าแรก</a></li>

        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>
        @else
            <li class="ิdropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
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
        {!! HTML::script('Mentor/js/jquery.min.js') !!}
        {!! HTML::script('Mentor/js/jquery.easing.min.js') !!}
        {!! HTML::script('Mentor/js/bootstrap.min.js') !!}
        {!! HTML::script('Mentor/js/custom.js') !!}
        {!! HTML::script('Mentor/contactform/contactform.js') !!}
        {!! HTML::script('sweetalert-master/dist/sweetalert.min.js') !!}
        {!! HTML::script('fullcalendar/lib/jquery.min.js') !!}
        {!! HTML::script('fullcalendar/lib/moment.min.js') !!}
        {!! HTML::script('fullcalendar/fullcalendar.js') !!}
        @yield('scripts')

        @include('sweet::alert')
    </body>
    </html>

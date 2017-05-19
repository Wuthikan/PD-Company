<!DOCTYPE html>
<html>
  <head>
    <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
  <script src='lib/jquery.min.js'></script>
  <script src='lib/moment.min.js'></script>
  <script src='fullcalendar/fullcalendar.js'></script>
    <meta charset="utf-8">
    <title>Shipping</title>
  </head>
  <body>
    <h1>Shipping</h1>
    <hr />
    <form action="{{ route('shipping.store') }}" method="post">
       {{ csrf_field() }}

    <input type="text" name="type" placeholder="type">
    <input type="date" name="date">
    <button type="submit" name="button">Create</button>
<hr>
</form>
    <a href="{{ route('shipping.type1') }}">List Type: 1</a>
  </br>
    <a href="{{ route('shipping.type2') }}">List Type: 2</a>

    <hr>
    <form action="{{ route('shipping.chkAvailable') }}" method="post">
      {{ csrf_field() }}
    <input type="date" name="date">
      <button type="submit" name="button">Check</button>
  </form>
      <a href="{{ route('shipping.recipt') }}" class="btn btn-warning pull-left"><i class="glyphicon glyphicon-circle-arrow-down"></i> ดาวโหลดใบเสร็จ</a>
<div id="calendar"></div>

  </body>
  <script type="text/javascript">
  $(document).ready(function() {

  // page is now ready, initialize the calendar...

  $('#calendar').fullCalendar({
      // put your options and callbacks here
  })

});
  </script>
</html>

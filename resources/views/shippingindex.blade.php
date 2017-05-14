<!DOCTYPE html>
<html>
  <head>
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

  </body>
</html>

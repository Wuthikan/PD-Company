@extends('layouts.main')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>สินค้า</h2>
          <hr class="bottom-line">
                <div class="row">
                    <div class="col-xs-7 col-md-10 col-sm-9"></div>
                    <div class="col-xs-5 col-md-2 col-sm-3">  <p>
                        <a href="{{ url("product/create") }}">
                          <button name="button" type="button" class="btn btn-block btn-submit">
                          เพิ่มสินค้า <i class="fa fa-arrow-right"></i></button>
                        </a>
                      </p>
                  </div>
                </div>
        </div>
        <table class="table  table-hover table-striped ">
            <tr>
                <th>เลขที่</th>
                  <th> รายการ </th>
                      <th> ความกว้าง </th>
                      <th> คงเหลือ </th>



            </tr>
            <?php $i = 1; ?>
            <tr>
                <td>  {{ $i }} </td>
                <td> คอนกรีตผสม  </td>
                <td> - </td>
                <td> -  </td>
            </tr>
            <?php $i++; ?>
            @foreach($products as $product)
            <tr>
                <td>  {{ $i }} </td>
                <td> <a href="{{ url('product/'. $product->id) }}">
                          {{ $product->name }}
                      </a>
                </td>
                <td>  {{ $product->width }} </td>
                <td> {{ $product->amount }} </td>
            </tr>
            <?php $i++; ?>
              @endforeach

        </table>

    </div>

</section>

@endsection

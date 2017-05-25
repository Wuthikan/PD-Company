@extends('layouts.main')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>คอนกรีตแผ่นพื้น</h2>
          <hr class="bottom-line">
                <div class="row">
                    <div class="col-xs-7 col-md-10 col-sm-9"></div>
                    <div class="col-xs-5 col-md-2 col-sm-3">  <p>
                          <a href="{{ route('extraconcrete.add', ['id' => $idinvoice])}}">
                          <button name="button" type="button" class="btn btn-block btn-submit">
                          สั่งสินค้าขนาดพิเศษ <i class="fa fa-arrow-right"></i></button>
                        </a>
                      </p>
                  </div>
                </div>
        </div>
        <table class="table  table-hover table-striped ">
            <tr>
                <th>เลขที่</th>
                  <th> รายการ </th>
                  <th> ความยาว </th>
                      <th> คงเหลือ </th>
                      <th></th>
            </tr>
            <?php $i = 1; ?>
            @foreach($products as $product)
            <tr>
                <td>  {{ $i }} </td>
                <td>
                          {{ $product->name }}
                </td>
                <td>
                          {{ $product->height }}
                </td>
                <td> {{ $product->amount }} </td>
                <td><a href="{{ route('boxconcrete.select', ['id' => $idinvoice ,'idproduct' => $product->id])}}"> Buy </a></td>
            </tr>
            <?php $i++; ?>
              @endforeach

        </table>

    </div>

</section>

@endsection

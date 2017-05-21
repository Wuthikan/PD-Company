@extends('layouts.main')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>รายการสิ่งสินค้า {{ $invoice->code }}</h2>
          <hr class="bottom-line">
                <div class="row">
                    <div class="col-xs-5 col-md-2 col-sm-3">
                      <a href="{{ url('invoiceall/'. $invoice->id) }}">
                        <button name="button" type="button" class="btn btn-block btn-submit">
                          <i class="fa fa-arrow-left" aria-hidden="true"></i> ใบเสนอราคา</button>
                      </a>
                    </div>
                      <div class="col-xs-2 col-md-8 col-sm-6"></div>
                    <div class="col-xs-5 col-md-2 col-sm-3">

                        <a href="{{ route('shipping.check', ['id' => $invoice->id ])}}">
                          <button name="button" type="button" class="btn btn-block btn-submit">
                              เพิ่มรายการขนส่ง<i class="fa fa-plus" aria-hidden="true"></i></button>
                        </a>

                  </div>
                </div>
        </div>

        @if (!$shippings->isEmpty())
        <table class="table  table-hover table-striped ">
            <tr>
                <th>เลขที่</th>
                  <th> รายการ </th>
                      <th> วันที่ส่ง </th>
                      <th> ทะเบียนรถส่งสินค้า </th>
                      <th> ระยะขนส่ง </th>
                      <th></th>
                      <th></th>
                        <th></th>


            </tr>
            <?php $i = 1; ?>
            @foreach($shippings as $shippings)
            <tr>
                <td>  {{ $i }} </td>
                <td> {{ $shippings->code }}  </td>
                <td>
                   {{ $shippings->date->formatLocalized('%d %B %Y') }}
                 </td>
                <td> {{ $shippings->licenseplate }}  </td>
                <td> {{ $shippings->distance }}  </td>
                <td><a href="{{ route('shipping.edit', ['id' => $shippings->id ])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>

                  <td>
                  <a href="{{ route('shipping.destroy', ['id' => $shippings->id,'idinvoice' => $shippings->idinvoice]) }}"  >
                    <i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                    <td>
                  <a href="{{ route('shipping.pdf', ['id' => $shippings->id,'idinvoice' => $shippings->idinvoice]) }}"  > 
                      <i class="fa fa-print" aria-hidden="true"></i></a></td>
            </tr>
            <?php $i++; ?>
              @endforeach

        </table>
        @endif
    </div>

</section>

@endsection

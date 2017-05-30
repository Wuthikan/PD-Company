@extends('layouts.menuinventory')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>รายการสั่งซื้อ@if($type=='1')สินค้าปกติ@elseสินค้าขนาดพิเศษ@endif</h2>
          <hr class="bottom-line">

        </div>
        <table class="table  table-hover table-striped ">
            <tr>
                <th class="col-md-1 text-center">เลขที่</th>
                  <th class="col-md-4 text-center"> รายการ </th>
                  <th class="col-md-1 text-right"> ยาว </th>

                      <th class="col-md-2 text-right"> จำนวน </th>
                      <th class="col-md-2 text-right"> เลขที่ใบสั่งซื้อ </th>

            </tr>
            <?php  $i = 1; ?>
            @foreach($orderconcrete as $orderconcrete)
            <tr>
                <td class="text-center">  {{ $i }} </td>
                <td>  <a >
                    @if($type=='1')
                          {{ $orderconcrete->products->name }}
                    @else
                        {{ $orderconcrete->name }}
                    @endif
                      </a>

                </td>
                <td class="text-right">
                  @if($type=='1')
                        {{ $orderconcrete->products->height }}
                  @else
                      {{ $orderconcrete->height }}
                  @endif

                </td>

                <td class="text-right"> {{ $orderconcrete->amount }} แผ่น</td>
                <td class="text-right">
                    <a href="{{ url('BoxConcreteInventory/'. $orderconcrete->invoices->id) }}">
                    QT{{ $orderconcrete->invoices->code }}
                  </a>
                 </td>

            </tr>
            <?php $i++; ?>
              @endforeach

        </table>

    </div>
    <div class="row">
      <hr>
      <div class="col-md-1">
        <a href="{{ url('/Invenry/manuExtra') }}">
          <i class="fa fa-chevron-left" aria-hidden="true"></i> Back
        </a>
      </div>
    </div>
</div>
</section>
@endsection

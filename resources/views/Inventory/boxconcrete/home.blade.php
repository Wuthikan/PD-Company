@extends('layouts.menuinventory')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>รายการใบสั่งซื้อคอนกรีตแผ่นพื้น</h2>
          <hr class="bottom-line">
        </div>
        <table class="table  table-hover table-striped ">
            <tr>
                <th class="col-md-1">เลขที่</th>
                  <th class="col-md-2"> วันที่ </th>
                  <th class="col-md-2"> รายการ </th>
                      <th class="col-md-2"> ลูกค้า </th>
                      <th class="col-md-2"> สถานะสินค้า </th>
                        <th class="col-md-1">  </th>
            </tr>
            <?php $i = 1; ?>
            @foreach($invoice as $invoice)

            <tr>

                <td >
                   {{ $i }} </td>
                <td >
                   {{ $invoice->updated_at->formatLocalized('%d/%m/%Y') }}
    </td>
                <td>
                        <a href="{{ url('BoxConcreteInventory/'. $invoice->id) }}">  QT{{ $invoice->code }} </a>
                </td>
                <td>

               @if(isset($invoice->idcustomer))
                    {{ $invoice->customers->name }}
                  @else
                    -
                  @endif
                </td>
                 <td>

                 @if($invoice->shipping=='2')
                   ส่งสินค้าแล้ว
                   @else
                    <a href="{{ url('BoxConcreteInventory/'. $invoice->id) }}">
                         ยังไม่ได้ส่ง
                    </a>
                   @endif

                 </td>
                 <td>  <a href="{{ url('BoxConcreteInventory/'. $invoice->id) }}">
                   <i class="fa fa-search-plus" aria-hidden="true"></a></i></td>
            </tr>
            <?php $i++; ?>
              @endforeach

        </table>

    </div>
    <div class="row">
      <hr>
      <div class="col-md-1">
        <a href="{{ url('/Inventory') }} ">
          <i class="fa fa-chevron-left" aria-hidden="true"></i> Back
        </a>
      </div>
    </div>
    </div>
  </div>
</div>
</section>
@endsection

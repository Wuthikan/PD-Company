@extends('layouts.main')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">

@if (!$invoices->isEmpty())
        <div class="header-section text-left">
        <p><b>รายการสั่งซื้อที่สมบูรณ์</b></p>
        <div>
      <table class="table  table-hover table-striped ">
          <tr>
              <th class="text-center">เลขที่</th>
              <th class="text-center"> วันที่</th>
                <th class="text-center"> รหัสใบสั่งซื้อ </th>
                  <th class="text-center"> ประเภท </th>

                    <th class="text-center"> ชื่อลูกค้า </th>
                    <th class="text-center"> สถานะใบเสร็จ </th>
                      <th class="text-center"></td>



          </tr>

          <?php $i = 1; ?>

          @foreach($invoices as $invoices)
          <tr>
              <td class="text-center">  {{ $i }} </td>
              <td class="text-center">  {{ $invoices->created_at->formatLocalized('%d %B %Y') }}

              </td>
              <td class="text-center">

                   <a href="{{ url('invoiceall/'. $invoices->id) }}">

                        QT{{ $invoices->code }}
                  </a>
               </td>
                 <td class="text-center">
                   @if($invoices->type=='1')
                    คอนกรีตผสม
                   @else
                    แผ่นพื้น
                   @endif
                </td>
              <td class="text-center">
                @if(isset($invoices->idcustomer))
                  {{ $invoices->customers->name }}
                @else
                  -
                @endif
               </td>
               <td class="text-center">
                 @if($invoices->signature=='1')
                  อนุมัติแล้ว
                 @else
                  รอการอนุมัติ
                 @endif
               </td>
               <td class="text-center">
                <a href="{{ url('invoiceall/'. $invoices->id) }}">
                <i class="fa fa-file-text-o" aria-hidden="true"></i> </a>
               </td>
          </tr>
          <?php $i++; ?>
            @endforeach
      </table>


    </div>
@endif
</section>

@endsection

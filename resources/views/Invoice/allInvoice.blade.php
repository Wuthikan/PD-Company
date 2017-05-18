@extends('layouts.main')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>รายการใบสั่งซื้อ</h2>
          <hr class="bottom-line">
        </div>
          <div class="header-section text-left">
          <p>รายการสั่งซื้อที่ยังไม่สมบูรณ์</p>
          <div>
        <table class="table  table-hover table-striped ">
            <tr>
                <th>เลขที่</th>
                <th> วันที่</th>
                  <th> รหัสใบสั่งซื้อ </th>
                      <th> ชื่อลูกค้า </th>
                      <th></th>
            </tr>
            <?php $i = 1; ?>

            @foreach($invoicesEx as $invoicesEx)
            <tr>
                <td>  {{ $i }} </td>
                <td>  {{ $invoicesEx->created_at->formatLocalized('%d %B %Y') }}

                </td>
                <td>
                  @if($invoicesEx->type=='1')
                   <a href="{{ url('invoiceConcrete/'. $invoicesEx->id) }}">
                  @else
                     <a href="{{ url('invoiceBoxConcrete/'. $invoicesEx->id) }}">
                  @endif
                          {{ $invoicesEx->code }}
                    </a>
                 </td>
                <td>
                  @if(isset($invoicesEx->idcustomer))
                    {{ $invoicesEx->customers->name }}
                  @else
                    -
                  @endif
                 </td>
                 <td>
                   @if($invoicesEx->type=='1')
                    <a href="{{ url('invoiceConcrete/'. $invoicesEx->id) }}">
                   @else
                      <a href="{{ url('invoiceBoxConcrete/'. $invoicesEx->id) }}">
                   @endif  <i class="fa fa-arrow-right"></i> </a>
                 </td>
            </tr>
            <?php $i++; ?>
              @endforeach

        </table>
        <div class="header-section text-left">
        <p>รายการสั่งซื้อที่สมบูรณ์</p>
        <div>
      <table class="table  table-hover table-striped ">
          <tr>
              <th>เลขที่</th>
              <th> วันที่</th>
                <th> รหัสใบสั่งซื้อ </th>
                    <th> ชื่อลูกค้า </th>
                    <th></th>




          </tr>

          <?php $i = 1; ?>

          @foreach($invoices as $invoices)
          <tr>
              <td>  {{ $i }} </td>
              <td>  {{ $invoices->created_at->formatLocalized('%d %B %Y') }}

              </td>
              <td>
                @if($invoices->type=='1')
                 <a href="{{ url('invoiceall/'. $invoices->id) }}">
                @else
                   <a href="{{ url('invoiceall/'. $invoices->id) }}">
                @endif
                        {{ $invoices->code }}
                  </a>
               </td>
              <td>
                @if(isset($invoices->idcustomer))
                  {{ $invoices->customers->name }}
                @else
                  -
                @endif
               </td>
               <td>
                 @if($invoices->type=='1')
                  <a href="{{ url('invoiceall/'. $invoices->id) }}">
                 @else
                    <a href="{{ url('invoiceall/'. $invoices->id) }}">
                 @endif  <i class="fa fa-arrow-right"></i> </a>
               </td>
          </tr>
          <?php $i++; ?>
            @endforeach
      </table>


    </div>

</section>

@endsection

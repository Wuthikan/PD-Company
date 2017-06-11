@extends('layouts.main')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>รายการใบสั่งซื้อ</h2>
          <hr class="bottom-line">
        </div>

@if (!$invoicesEx->isEmpty())
          <div class="header-section text-left">
          <p>รายการสั่งซื้อที่ยังไม่สมบูรณ์</p>
        </div>
        <table class="table  table-hover table-striped ">
            <tr>
                <th class="text-center">เลขที่</th>
                <th class="text-center"> วันที่</th>
                  <th class="text-center"> รหัสใบสั่งซื้อ </th>
                    <th class="text-center"> ประเภท </th>
                      <th class="text-center"> ชื่อลูกค้า </th>
                      <th class="text-center">แก้ไข</th>
                      <th class="text-center">ลบ</th>
            </tr>
            <?php $i = 1; ?>

            @foreach($invoicesEx as $invoicesEx)
            <tr>
                <td class="text-center">  {{ $i }} </td>

                <td class="text-center">  {{ $invoicesEx->created_at->formatLocalized('%d %B %Y') }}

                </td>
                <td class="text-center">
                  @if($invoicesEx->type=='1')
                   <a href="{{ url('invoiceConcrete/'. $invoicesEx->id) }}">
                  @else
                     <a href="{{ url('invoiceBoxConcrete/'. $invoicesEx->id) }}">
                  @endif
                          QT{{ $invoicesEx->code }}
                    </a>
                 </td>
                 <td class="text-center">
                   @if($invoicesEx->type=='1')
                    คอนกรีตผสม
                   @else
                    แผ่นพื้น
                   @endif
                 </td>
                <td class="text-center">
                  @if(isset($invoicesEx->idcustomer))
                    {{ $invoicesEx->customers->name }}
                  @else
                    -
                  @endif
                 </td>
                 <td class="text-center">
                   @if($invoicesEx->type=='1')
                    <a href="{{ url('invoiceConcrete/'. $invoicesEx->id) }}">
                   @else
                      <a href="{{ url('invoiceBoxConcrete/'. $invoicesEx->id) }}">
                   @endif <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                 </td>
                  <td class="text-center">
                    <a href="#"  onclick="return delete_record();"  >
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                  </a>
                  </td>
            </tr>
            <?php $i++; ?>

            <script>
            function delete_record(){
              swal({
            title: "คุณต้องการลบหรือไม่?",
            text: 'ใบเสนอราคา QT<?=$invoicesEx->code?>',
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
          },
          function(){
            if (<?=$invoicesEx->type?>=='1') {
              window.location.assign('/invoiceConcrete/delete/<?=$invoicesEx->id?>');
            }
            else{
            window.location.assign('/invoiceBoxConcrete/delete/<?=$invoicesEx->id?>');
          }
          });
            }
            </script>

              @endforeach

        </table>
@endif
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
                 @if($invoices->signature==null)
                  รอการอนุมัติ
                 @else
                  อนุมัติแล้ว
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

@extends('layouts.menuinventory')

@section('content')
<section id ="feature" class="section-padding">
			<div class="container">
				<div class="row">

					<div class="header-section text-center">
						<h2>รายการสั่งซื้อคอนกรีตแผ่นพื้น</h2>
							<p>เลขที่ใบเสนอราคา   QT{{ $invoices->code }}</p>
							@if(isset($invoices->idcustomer))
								 ชื่อลูกค้า {{ $invoices->customers->name }}
							@endif
						<hr class="bottom-line">
				<hr>
          </div>
					<br>
					<table class="table  table-hover table-striped ">
							<tr>
								 	<th >เลขที่</th>
										<th > รายการ </th>
												<th> จำนวณ </th>
                        <th> สถานะสินค้า </th>
                        <th> สถานะส่ง </th>
							</tr>
							<?php $i = 1; ?>
							@foreach($concrete as $concretes)
              <tr>
								 	<td>  {{ $i }} </td>
									<td>
										 			{{ $concretes->products->name }}	0.35x{{ $concretes->products->height }}
									</td>
									<td>  {{ $concretes->amount }} แผ่น </td>
                  <td> <?php $state = $concretes->state; ?>
                      @if($state==1)
                      มีอยู่ในคลัง
                      @elseif($state==2)
                      สั่งผลิตเพิ่ม
                      @elseif($state==3)
                      ส่งสินค้าแล้ว
                      @endif
                      </td>
                  <td>
										@if($concretes->shipping==null)
										<a href="{{ route('boxconcrete.inventory', ['id' => $concretes->id,'type' => '1']) }}"  >
                       ยืนยัน
											 <i class="fa fa-check-square-o" aria-hidden="true"></i>
										 </a>
										@elseif($concretes->shipping=='1')
											<a href="#"  onclick="return edit_record<?=$i?>();" >
												ยืนยันแล้ว
											</a>
										@endif
									</td>
							</tr>
							<script>
							function edit_record<?=$i?>(){
								swal({
							title: "คุณต้องการเปลี่ยนสถานะเป็นยังไม่ได้ส่งหรือไม่?",
							text: ' คอนกรีตผสมเสร็จรายการที่ <?=$i?>',
							type: "warning",
							showCancelButton: true,
							confirmButtonColor: "#DD6B55",
							confirmButtonText: "Yes",
							closeOnConfirm: false
							},
							function(){
							window.location.assign('/BoxConcreteInventory/edit2/<?=$concretes->id?>/1');
							});
							}
							</script>


							<?php $i++; ?>
								@endforeach

                @foreach($Extraconcrete as $Extraconcretes)
                <tr>
  								 	<td>  {{ $i }} </td>
  									<td>
  										 			{{ $Extraconcretes->name }}	0.35x{{ $Extraconcretes->height }}
  									</td>
  									<td>  {{ $Extraconcretes->amount }} แผ่น </td>
                    <td>สั่งทำพิเศษ</td>
                    <td>
  										@if($Extraconcretes->shipping==null)
  										<a href="{{ route('boxconcrete.inventory', ['id' => $Extraconcretes->id,'type' => '2']) }}"  >
                         ยืนยัน
  											 <i class="fa fa-check-square-o" aria-hidden="true"></i>
  										 </a>
  										@elseif($Extraconcretes->shipping=='1')
  											<a href="#"  onclick="return edit_recordEX<?=$i?>();" >
  												ยืนยันแล้ว
  											</a>
  										@endif
  									</td>
  							</tr>
  							<script>
  							function edit_recordEX<?=$i?>(){
  								swal({
  							title: "คุณต้องการเปลี่ยนสถานะเป็นยังไม่ได้ส่งหรือไม่?",
  							text: ' คอนกรีตผสมเสร็จรายการที่ <?=$i?>',
  							type: "warning",
  							showCancelButton: true,
  							confirmButtonColor: "#DD6B55",
  							confirmButtonText: "Yes",
  							closeOnConfirm: false
  							},
  							function(){
  							window.location.assign('/BoxConcreteInventory/edit2/<?=$Extraconcretes->id?>/2');
  							});
  							}
  							</script>


  							<?php $i++; ?>
  								@endforeach
						</table>

			</div>
			<div class="row">
				<hr>
				<div class="col-md-1">
					<a href="{{ url('/BoxConcreteInventory') }}">
						<i class="fa fa-chevron-left" aria-hidden="true"></i> Back
					</a>
				</div>
			</div>
			</div>
		</div>


	</section>

@endsection

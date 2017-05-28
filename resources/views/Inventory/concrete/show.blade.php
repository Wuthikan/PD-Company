@extends('layouts.menuinventory')

@section('content')
<section id ="feature" class="section-padding">
			<div class="container">
				<div class="row">

					<div class="header-section text-center">
						<h2>รายการสั่งซื้อคอนกรีตผสมเสร็จ</h2>
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
                        <th> สถานะส่ง </th>
							</tr>
							<?php $i = 1; ?>
							@foreach($concrete as $concretes)
              <tr>
								 	<td>  {{ $i }} </td>
									<td>
										 				คอนกรีตผสมเสร็จ
									</td>
									<td>  {{ $concretes->amount }} คิว </td>
                  <td>
										@if($concretes->shipping==null)
										 <a  href="{{ url("ConcreteInventory/{$concretes->id}/edit") }}">ยืนยัน
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
							window.location.assign('/ConcreteInventory/edit2/<?=$concretes->id?>');
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
					<a href="{{ url('/ConcreteInventory') }}">
						<i class="fa fa-chevron-left" aria-hidden="true"></i> Back
					</a>
				</div>
			</div>
			</div>
		</div>


	</section>

@endsection

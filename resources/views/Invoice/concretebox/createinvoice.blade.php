@extends('layouts.main')

@section('content')

<section id ="feature" class="section-padding">
			<div class="container">
				<div class="row">
					<div class="header-section text-center">
						<h2>รายการสั่งซื้อคอนกรีตแผ่นพิ้น</h2>
							<p>เลขที่ใบเสนอราคา   {{ $invoices->code }}</p>
							@if(isset($invoices->idcustomer))
								 ชื่อลูกค้า  คุณ {{ $customer->name }}
									   <a href="{{ url("customer/{$customer->id}/edit?idinvoice={$invoices->id}") }}">แก้ไข <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
								 </a>
							@endif
						<hr class="bottom-line">
				<hr>

          </div>

					<div class="row">
							<div class="col-xs-12 col-md-2 col-sm-3">  @if(empty($invoices->idcustomer))
									 <a href="{{ route('customer.add', ['id' => $invoices->id]) }} ">
										 <button name="button" type="button" class="btn btn-green btn-block btn-flat">
										เพิ่มข้อมูลลูกค้า  <i class="fa fa-address-card-o"></i>
									 </button>

									</a>
								@endif
							 </div>
							 <div class="col-xs-12 col-md-7 col-sm-5">
								 <br>
							 </div>
							<div class="col-xs-12 col-md-3 col-sm-4">
								<a href="#" data-target="#add" data-toggle="modal" >
									<button name="button" type="button" class="btn btn-green btn-block btn-flat">
										เพิ่มรายการสินค้า <i class="fa fa-plus-square-o"></i>
								</button>
								</a>
							</div>
					</div>
					<br>

					<table class="table  table-hover table-striped ">
						<tr>
								<th class="col-md-1 text-center">เลขที่</th>
									<th class="col-md-3 text-center"> รายการ </th>
											<th class="col-md-2 text-right"> จำนวณ </th>
											<th class="col-md-2 text-right"> หน่วยละ </th>
											<th class="col-md-2 text-right"> ราคารวมภาษี </th>
											<th class="col-md-1 text-right"> แก้ไข </th>
											<th class="col-md-1 text-right"> ลบ </th>
						</tr>
							<?php $i = 1; $sumtotal=0; ?>
							@foreach($concrete as $concretes)
              <tr>
								 	<td class=" text-center" >  {{ $i }} </td>
									<td class=" text-center">
										 		{{ $concretes->products->name }}
												{{ $concretes->products->width }}x{{ $concretes->height }}
												จำนวณ{{ $concretes->amount }}แผ่น
									</td>
									<?php $sum = $concretes->products->width*$concretes->height*$concretes->amount;
										$a = number_format($sum, 3, '.', '');  	?>
									<td class=" text-right" >  {{ number_format($sum, 3, '.', '') }} ตร.ม</td>
									<td class=" text-right">  {{ number_format($concretes->price, 3, '.', '') }} </td>
									<?php $total=$sum*$concretes->price;
													$total = number_format($total, 2, '.', '');
									 ?>
                  <td class=" text-right">  {{ $total }} </td>
									<td class=" text-right" ><a href="{{ url("boxconcrete/{$concretes->id}/edit?idinvoice={$invoices->id}") }}">
										<i class="fa fa-pencil" aria-hidden="true"></i>
									</a> </td>
									<td class=" text-right">


										<a href="{{ route('boxconcrete.delete', ['id' => $concretes->id,'idinvoice' => $invoices->id]) }}"  >
									  <i class="fa fa-trash-o" aria-hidden="true"></i>
										</a>

								 </td>
							</tr>
							<?php  $sumtotal=$sumtotal+$total; ?>
							<?php $i++; ?>
								@endforeach


								@foreach($Extraconcrete as $Extraconcretes)
								<tr>
										<td class=" text-center">  {{ $i }} </td>
										<td class=" text-center">
													{{ $Extraconcretes->name }}
													{{ $Extraconcretes->width }}x{{ $Extraconcretes->height }}
													จำนวณ{{ $Extraconcretes->amount }}แผ่น
										</td>
										<?php $sum = $Extraconcretes->width*$Extraconcretes->height*$Extraconcretes->amount;
											$a = number_format($sum, 3, '.', '');  	?>
										<td  class=" text-right">  {{ number_format($sum, 3, '.', '') }} ตร.ม</td>
										<td class=" text-right">  {{ number_format($Extraconcretes->price, 3, '.', '') }} </td>
										<?php $total=$sum*$Extraconcretes->price;
														$total = number_format($total, 2, '.', '');
										 ?>
										<td class=" text-right">  {{ $total }} </td>
										<td class=" text-right" ><a href="{{ url("extraconcrete/{$Extraconcretes->id}/edit?idinvoice={$invoices->id}") }}">
											<i class="fa fa-pencil" aria-hidden="true"></i>
										</a> </td>
										<td class=" text-right">


											<a href="{{ route('extraconcrete.delete', ['id' => $Extraconcretes->id,'idinvoice' => $invoices->id]) }}"  >
											 <i class="fa fa-trash-o" aria-hidden="true"></i>
											</a>

									 </td>
								</tr>
								<?php  $sumtotal=$sumtotal+$total; ?>
								<?php $i++; ?>
									@endforeach


								@foreach($other as $others)
	              <tr>
									 	<td class=" text-center">  {{ $i }} </td>
										<td class=" text-center">
											 			{{ $others->detail }}
										</td>
										<td class=" text-right">   </td>
										<td class=" text-right">  </td>
	                  <td class=" text-right"> {{ $others->price }}   </td>
										<td class=" text-right" >
											<a href="{{ url("other/{$others->id}/edit?idinvoice={$invoices->id}") }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> </td>
										<td class=" text-right">


											<a href="{{ route('other.delete', ['id' => $others->id,'idinvoice' => $invoices->id]) }}"  >
										   <i class="fa fa-trash-o" aria-hidden="true"></i>
											</a>

									 </td>

								</tr>
								<?php  $sumtotal=$sumtotal+$others->price; ?>
								<?php $i++; ?>
									@endforeach

									@if (!$concrete->isEmpty()||!$Extraconcrete->isEmpty())
									<tr>
										<td></td>
										<td></td>
										<td colspan="2">
											<b>รวมเป็นเงิน </b>
										</td>
										<td>
											<b><?=number_format($sumtotal, 2, '.', '');?></b>
										<td>
										</td>
										<td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td colspan="2" >
											<b>หักส่วนลด
												<a href="#" data-target="#editdiscount" data-toggle="modal">เพิ่มส่วนลด <i class="fa fa-plus" aria-hidden="true"></i></a>
											</b>
										</td>
										<td>
											<b>
												{{ number_format($invoices->discount, 2, '.', '') }}</b>
										</td>
										<td>
										</td>
										<td>
										</td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td colspan="2" >
											<b>จำนวณนเงินรวมทั้งสิ้น</b>
										</td>
										<td>
												<b><?=number_format($sumtotal-$invoices->discount, 2, '.', '');?></b>
										</td>
										<td>
										</td>
										<td>
										</td>
									</tr>

														@else
															<tr><td colspan="7" class="text-center">- ไม่มีรายการสินค้าที่เลือก -</td></tr>
															<tr><td colspan="7"></td></tr>
																<tr><td colspan="7"></td></tr>
														@endif

					</table>

					<!--Modal box -->
					<div class="modal fade" id="editdiscount" role="dialog">
						<div class="modal-dialog modal-sm">
							<!-- Modal content no 1-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title text-center form-title">เพิ่มส่วนลด</h4>
								</div>
								<div class="modal-body padtrbl">

									<div class="login-box-body">
										<div class="form-group">

										<form action="{{ route('invoice.editDiscount', ['id'=>$invoices->id]) }}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input class="form-control" name="discount" id="discount" type="text" autocomplete="off" />
															<br>
													<button type="submit" class="btn btn-bg green btn-block"  >
													 ตกลง
												 </button>
										</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

			</div>
			<div class="row" >
				@if (!$concrete->isEmpty()||!$Extraconcrete->isEmpty())
			<div class="col-xs-12 col-md-3 col-sm-4">
			<a href="{{ route('invoiceBoxConcrete.confirm', ['id' => $invoices->id])}}">
				<button name="button" type="button" class="btn btn-green btn-block btn-flat">
				ยืนยันใบเสนอราคา <i class="fa fa-check-square-o"></i></button>
			</a>
			</div>
			@else
			<div class="col-xs-12 col-md-3 col-sm-4">
			</div>
			@endif
				<div class="col-xs-12 col-md-6 col-sm-4">
					<br>
				</div>
			<div class="col-xs-12 col-md-3 col-sm-4">
				<a href="#"  onclick="return delete_record();"  >
				<button name="button" type="button" class="btn btn-green btn-block btn-flat">
				ยกเลิกใบเสนอราคา <i class="fa fa-trash-o"></i></button>
			</a>
			</div>
		</div>

		<script>
		function delete_record(){
			swal({
	  title: "คุณต้องการลบหรือไม่?",
	  text: 'ใบเสนอราคา <?=$invoices->code?>',
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Yes, delete it!",
	  closeOnConfirm: false
	},
	function(){
	  window.location.assign('/invoiceBoxConcrete/delete/<?=$invoices->id?>');
	});
		}
		</script>


		<!--Modal box add-->
<div class="modal fade" id="add" role="dialog">
	<div class="modal-dialog modal-sm">
		<!-- Modal content no 1-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

				<p class="modal-title text-center form-title">
						เลือกรายการที่คุณต้องการ
				</p>
					</div>
			<div class="modal-body padtrbl">

				<div class="login-box-body">
					<p class="text-center"></p>
					<div class="form-group">
							<a href="{{ route('boxconcrete.open', ['id' => $invoices->id])}}">
								<button type="submit" class="btn btn-bg green btn-block"  >
								 เพิ่มสินค้า
							 </button>
						</a>
					</div>
					<hr>
					<div class="form-group">
								<a href="{{ route('other.add', ['id' => $invoices->id])}}">
								<button type="submit" class="btn btn-bg green btn-block"  >
								 เพิ่มรายการค่าใช้จ่ายเพิ่มเติม
							 </button>
						 </a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


	</section>

@endsection

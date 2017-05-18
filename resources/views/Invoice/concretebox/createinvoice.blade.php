@extends('layouts.main')

@section('content')

<section id ="feature" class="section-padding">
			<div class="container">
				<div class="row">
					<div class="header-section text-center">
						<h2>ใบเสนอราคา</h2>
						<hr class="bottom-line">

          </div>
					<div class="row">
              <div class="col-xs-7 col-md-10 col-sm-9">  เลขที่ใบเสนอราคา   {{ $invoices->code }}</div>
              <div class="col-xs-5 col-md-2 col-sm-3">
							</div>
					</div>
					<div class="row">
              <div class="col-xs-7 col-md-10 col-sm-9">  ชื่อลูกค้า  @if(empty($invoices->idcustomer))
								   <a href="{{ route('customer.add', ['id' => $invoices->id]) }} ">
										เพิ่มข้อมูลลูกค้า
									</a>
								@else
									{{ $customer->name }}  <a href="{{ url("customer/{$customer->id}/edit?idinvoice={$invoices->id}") }}">แก้ไข</a>
								@endif
							</div>
              <div class="col-xs-5 col-md-2 col-sm-3">
							</div>
					</div>
          <div class="row">
              <div class="col-xs-7 col-md-10 col-sm-9"> </div>
              <div class="col-xs-5 col-md-2 col-sm-3">

                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          เพิ่มรายการ<span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu" role="menu">
                          <li>
                              <a href="{{ route('boxconcrete.open', ['id' => $invoices->id])}}">
                                เพิ่มสินค้า
                              </a>
                          </li>



                          <li>
                              <a href="{{ route('other.add', ['id' => $invoices->id])}}">
                                เพิ่มรายการค่าใช้จ่ายเพิ่มเติม
                              </a>
                          </li>
  												</ul>

              </div>
          </div>
					<table class="table  table-hover table-striped ">
							<tr>
								 	<th>เลขที่</th>
										<th> รายการ </th>
												<th> จำนวณ </th>
												<th> หน่วยละ </th>
                        <th> ราคารวมภาษี </th>
												<th> แก้ไข </th>
												<th> ลบ </th>
							</tr>
							<?php $i = 1; $sumtotal=0; ?>
							@foreach($concrete as $concrete)
              <tr>
								 	<td>  {{ $i }} </td>
									<td>
										 		{{ $concrete->products->name }}
												{{ $concrete->products->width }}x{{ $concrete->height }}
												จำนวณ{{ $concrete->amount }}แผ่น
									</td>
									<?php $sum = $concrete->products->width*$concrete->height*$concrete->amount;
										$a = number_format($sum, 3, '.', '');  	?>
									<td >  {{ number_format($sum, 3, '.', '') }} ตร.ม</td>
									<td>  {{ number_format($concrete->price, 3, '.', '') }} </td>
									<?php $total=$sum*$concrete->price;
													$total = number_format($total, 2, '.', '');
									 ?>
                  <td>  {{ $total }} </td>
									<td ><a href="{{ url("boxconcrete/{$concrete->id}/edit?idinvoice={$invoices->id}") }}">แก้ไข</a> </td>
									<td>


										<a href="{{ route('boxconcrete.delete', ['id' => $concrete->id,'idinvoice' => $invoices->id]) }}"  >
									  ลบ
										</a>

								 </td>
							</tr>
							<?php  $sumtotal=$sumtotal+$total; ?>
							<?php $i++; ?>
								@endforeach


								@foreach($Extraconcrete as $Extraconcrete)
								<tr>
										<td>  {{ $i }} </td>
										<td>
													{{ $Extraconcrete->name }}
													{{ $Extraconcrete->width }}x{{ $Extraconcrete->height }}
													จำนวณ{{ $Extraconcrete->amount }}แผ่น
										</td>
										<?php $sum = $Extraconcrete->width*$Extraconcrete->height*$Extraconcrete->amount;
											$a = number_format($sum, 3, '.', '');  	?>
										<td >  {{ number_format($sum, 3, '.', '') }} ตร.ม</td>
										<td>  {{ number_format($Extraconcrete->price, 3, '.', '') }} </td>
										<?php $total=$sum*$Extraconcrete->price;
														$total = number_format($total, 2, '.', '');
										 ?>
										<td>  {{ $total }} </td>
										<td ><a href="{{ url("extraconcrete/{$Extraconcrete->id}/edit?idinvoice={$invoices->id}") }}">แก้ไข</a> </td>
										<td>


											<a href="{{ route('extraconcrete.delete', ['id' => $Extraconcrete->id,'idinvoice' => $invoices->id]) }}"  >
											ลบ
											</a>

									 </td>
								</tr>
								<?php  $sumtotal=$sumtotal+$total; ?>
								<?php $i++; ?>
									@endforeach


								@foreach($other as $other)
	              <tr>
									 	<td>  {{ $i }} </td>
										<td>
											 			{{ $other->detail }}
										</td>
										<td>   </td>
										<td>  </td>
	                  <td> {{ $other->price }}   </td>
										<td >
											<a href="{{ url("other/{$other->id}/edit?idinvoice={$invoices->id}") }}">แก้ไข</a> </td>
										<td>


											<a href="{{ route('other.delete', ['id' => $other->id,'idinvoice' => $invoices->id]) }}"  >
										  ลบ
											</a>

									 </td>

								</tr>
								<?php  $sumtotal=$sumtotal+$other->price; ?>
								<?php $i++; ?>
									@endforeach


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
												<a href="#" data-target="#editdiscount" data-toggle="modal">เพิ่มส่วนลด</a>
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
			<div class="col-xs-6 col-md-3 col-sm-4">
			<a href="#" data-target="#delete" data-toggle="modal" >
				<button name="button" type="button" class="btn btn-green btn-block btn-flat">
				ยกเลิกใบเสนอราคา </button>
			</a>
			</div>
			<div class="col-xs-2 col-md-6 col-sm-4">
			</div>
			<div class="col-xs-6 col-md-3 col-sm-4">
				<a href="{{ route('invoiceBoxConcrete.confirm', ['id' => $invoices->id])}}">
					<button name="button" type="button" class="btn btn-green btn-block btn-flat">
					ยืนยันใบเสนอราคา <i class="fa fa-arrow-right"></i></button>
				</a>
			</div>
		</div>

				<!--Modal box delete-->
		<div class="modal fade" id="delete" role="dialog">
			<div class="modal-dialog modal-sm">
				<!-- Modal content no 1-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title text-center form-title">คุณต้องลบใบเสนอราคานี้หรือไม่</h4>
					</div>
					<div class="modal-body padtrbl">

						<div class="login-box-body">
							<p class="text-center"></p>
							<div class="form-group">
								  {!! Form::open(['method' => 'DELETE', 'url' => 'invoiceBoxConcrete/'. $invoices->id ]) !!}
										<button type="submit" class="btn btn-bg green btn-block"  >
										 Delete
									 </button>
									{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>

@endsection

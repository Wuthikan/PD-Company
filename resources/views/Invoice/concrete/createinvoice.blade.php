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
                              <a href="{{ route('concrete.add', ['id' => $invoices->id])}}">
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
												<th> จำนวณ(คิว) </th>
												<th> หน่วยละ </th>
                        <th> ราคารวม </th>
												<th> แก้ไข </th>
												<th> ลบ </th>
							</tr>
							<?php $i = 1; $sumtotal=0; ?>
							@foreach($concrete as $concrete)
              <tr>
								 	<td>  {{ $i }} </td>
									<td>
										 				คอนกรีตผสม
									</td>
									<td>  {{ $concrete->amount }} </td>
									<td>  {{ $concrete->price }} </td>
									<?php $total=$concrete->amount*$concrete->price  ?>
                  <td>  {{ $total }} </td>
									<td ><a href="{{ url("concrete/{$concrete->id}/edit?idinvoice={$invoices->id}") }}">แก้ไข</a> </td>
									<td>


										<a href="{{ route('concrete.delete', ['id' => $concrete->id,'idinvoice' => $invoices->id]) }}"  >
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
											 				คอนกรีตผสม
										</td>
										<td>  {{ $other->detail }} </td>
										<td>  {{ $other->price }} </td>
	                  <td>   </td>
										<!-- <td ><a href="{{ url("concrete/{$concrete->id}/edit?idinvoice={$invoices->id}") }}">แก้ไข</a> </td> -->
										<td>


											<!-- <a href="{{ route('concrete.delete', ['id' => $concrete->id,'idinvoice' => $invoices->id]) }}"  >
										  ลบ
											</a> -->

									 </td>
								</tr>
								<?php  $sumtotal=$sumtotal+$total; ?>
								<?php $i++; ?>
									@endforeach


					</table>

			</div>

	</section>

@endsection

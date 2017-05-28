@extends('layouts.main')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>สร้างรายการส่งสินค้า </h2>
          <hr class="bottom-line">
        </div>
      </div>
    </div>
                <div class="row">
                    <div class="text-center">
                      @if($request->type==1)
                        <h3>คิวส่งคอนกรีตผสม</h3>
                            <p>วันที่ {{ $request->date }} มีคิวที่ลงไว้แล้ว {{ $result }} คิว</p>
                          </div>
                            {{  Form::open(['route' => 'shipping.addShipping' , 'class' => 'form-horizontal']) }}
                                   {{ csrf_field() }}

                                <input type="hidden" name="idinvoice" value="{{ $request->idinvoice }}">
                                <input type="hidden" name="type" value="{{ $request->type }}">
                                  <input type="hidden" name="date" value="{{ $request->date }}">
                                  <hr>
                                <div class="container">
                                  <div class="row">
                                      <div class="container">
                                    <div class="col-md-8 col-md-offset-1 col-sm-9 col-sm-offset-1 col-xs-12 ">

                                  <div class="form-group">
                                   <label for="inputPassword3" class="col-sm-4 col-md-3 col-xs-12 control-label">
                                     จำนวน(คิว)</label>
                                   <div class="col-sm-8 col-md-9 col-xs-12">
                                     <input type="text" class="form-control" name="amount" id="amount" >
                                   </div>
                                 </div>
                                  <hr>
                                 <div class="form-group">
                                  <label for="inputPassword3" class="col-sm-4 col-md-3 col-xs-12 control-label">
                                    จำนวนรถใหญ่(คัน)</label>
                                  <div class="col-sm-8 col-md-9 col-xs-12">
                                    <input type="text" class="form-control" id="bigcar" name="bigcar" >
                                  </div>
                                </div>

                                <div class="form-group">
                                 <label for="inputPassword3" class="col-sm-4 col-md-3 col-xs-12 control-label">
                                   จำนวนรถเล็ก(คัน)</label>
                                 <div class="col-sm-8 col-md-9 col-xs-12">
                                   <input type="text" class="form-control" id="smallcar" name="smallcar" >
                                 </div>
                               </div>
                                <div class="form-group">
                                  <div class="col-md-4 col-md-offset-8 col-sm-8 col-sm-offset-4 col-xs-9 col-xs-offset-3">
                                  {!! Form::submit('บันทึกรายการขนส่ง',['class'=>'btn btn-bg green btn-block']) !!}
                                </div>
                              </div>
                            {!! Form::close() !!}
                            <hr>
                          </div>
                            </div>
                          </div>
                            <div class="row">
                            <div class="text-center"><h2>รายการใบสั่งซื้อของคุณ</h2></div>
                            <div class="container">
                        <table class="table  table-hover table-striped ">
                            <tr>
                                <th class="col-md-1 text-center">เลขที่</th>
                                  <th class="col-md-3 text-center"> รายการ </th>
                                      <th class="col-md-2 text-right"> จำนวณ </th>

                            </tr>
                            <?php $i = 1; $sumtotal=0; ?>
                            @foreach($concrete as $concretes)
                            <tr>
                                <td class=" text-center">  {{ $i }} </td>
                                <td class=" text-center">
                                          คอนกรีตผสม
                                </td>
                                <td class=" text-right">  {{ $concretes->amount }} </td>
                            </tr>
                            <?php $sumtotal=$sumtotal+$concretes->amount ?>
                              @endforeach
                            <tr>
                                  <td></td>
                                  <td></td>
                                  <td class="text-right">รวม {{$sumtotal}} คิว</td>
                            </tr>
                          </table>
                        </div>
                        </div>

                      @else
                    </div>
                          <div class="text-center">
                        <h3>คิวส่งคอนกรีตแผ่นพื้น</h3>
  <p>วันที่ {{ $request->date }} มีคิวที่ลงไว้แล้ว {{ $result }} คิว</p>
                        </div>
                        <div class="container">
                        {{  Form::open(['route' => 'shipping.addShipping' , 'class' => 'form-horizontal']) }}
                               {{ csrf_field() }}

                            <input type="hidden" name="idinvoice" value="{{ $request->idinvoice }}">
                            <input type="hidden" name="type" value="{{ $request->type }}">
                              <input type="hidden" name="date" value="{{ $request->date }}">
                              <hr>
                            <div class="container">
                              <div class="row">
                                <div class="col-md-8 col-md-offset-1 col-sm-9 col-sm-offset-1 col-xs-12 ">
                              <div class="form-group">
                               <label for="inputPassword3" class="col-sm-4 col-md-3 col-xs-12 control-label">
                                 จำนวน (แผ่น)</label>
                               <div class="col-sm-8 col-md-9 col-xs-12">
                                 <input type="text" class="form-control" name="amount" id="amount" >
                               </div>
                             </div>
                             <hr>
                             <div class="form-group">
                              <label for="inputPassword3" class="col-sm-4 col-md-3 col-xs-12 control-label">
                                จำนวนรถ6ล้อ (คัน)</label>
                              <div class="col-sm-8 col-md-9 col-xs-12">
                                <input type="text" class="form-control" id="smallcar" name="smallcar" >
                              </div>
                            </div>
                            <div class="form-group">
                             <label for="inputPassword3" class="col-sm-4 col-md-3 col-xs-12 control-label">
                               จำนวนรถ10ล้อ (คัน)</label>
                             <div class="col-sm-8 col-md-9 col-xs-12">
                               <input type="text" class="form-control" id="bigcar" name="bigcar" >
                             </div>
                           </div>


                            <div class="form-group">

                              <div class="checkbox text-center">
                                  <label class="col-sm-8 col-md-9 col-xs-12">
                              <input type="checkbox"   name="crane" value="1"> ต้องการใช้รถเครน<br>
                                </label>
                              </div>
                            </div>


                            <div class="form-group">
                              <div class="col-md-4 col-md-offset-8 col-sm-8 col-sm-offset-4 ">
                              {!! Form::submit('บันทึกรายการขนส่ง',['class'=>'btn btn-bg green btn-block']) !!}
                            </div>
                          </div>
                        {!! Form::close() !!}
                      </div>
                    </div>
                    <hr>
                    <div class="contains">
                      <div class="row">
                        <div class="text-center"><h2>รายการใบสั่งซื้อของคุณ</h2></div>
                        <div class="container">
                        <table class="table  table-hover table-striped ">
                          <tr>
                              <th class="col-md-1 text-center">เลขที่</th>
                                <th class="col-md-4 text-center"> รายการ </th>
                                    <th class="col-md-1 text-right"> จำนวน </th>
                                    <th class="col-md-1 text-right"> สถานะ </th>
                          </tr>
              <?php $i = 1; $sumtotal=0; ?>
                            @foreach($concrete as $concretes)
                            <tr>
                                <td class=" text-center" >  {{ $i }} </td>
                                <td class=" text-center">
                                      {{ $concretes->products->name }}
                                      0.35x{{ $concretes->products->height }}

                                </td>
                                <td class=" text-right">
                                {{ $concretes->amount }}แผ่น
                              </td>
                                  <td class=" text-right">
                                @if($concretes->state=='1')
                                    พร้อมส่ง
                                  @elseif($concretes->state=='2')
                                    รอผลิต
                                  @elseif($concretes->state=='3')
                                    ส่งสินค้าแล้ว
                                  @endif
                                   </td>

                            </tr>
                            <?php  $sumtotal=$sumtotal+$concretes->amount; ?>
                            <?php $i++; ?>
                              @endforeach


                              @foreach($Extraconcrete as $Extraconcretes)
                              <tr>
                                  <td class=" text-center">  {{ $i }} </td>
                                  <td class=" text-center">
                                        {{ $Extraconcretes->name }}
                                        0.35x{{ $Extraconcretes->height }}
                                  </td>
                                  <td class=" text-right">
                                  {{ $Extraconcretes->amount }}แผ่น
                                </td>
                                  <td class=" text-right">สั่งผลิต</td>

                              </tr>
                              <?php  $sumtotal=$sumtotal+$Extraconcretes->amount; ?>
                              <?php $i++; ?>

                                @endforeach
                                <tr>
                                    <td colspan="2" class=" text-right">รวม</td>
                                      <td class=" text-right"> {{ $sumtotal }} แผ่น</td>
                                        <td></td>
                                </tr>
                            </table>
                          </div>
                      </div>
                    </div>

                      @endif
                      <div class="col-md-1">
                        <a href="#" onclick="goBack()">
                          <i class="fa fa-chevron-left" aria-hidden="true"></i> Back
                        </a>
                      </div>

                          </div>


                  </div>
                  </div>






                </div>
        </div>
    </div>
</div>

</section>
<script>
function goBack() {
    window.history.back();
}
</script>
@endsection
